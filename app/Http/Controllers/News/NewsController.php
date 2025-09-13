<?php

namespace App\Http\Controllers\News;

use App\Enums\CommentStatus;
use App\Enums\NewsStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\News\LeaveCommentPostRequest;
use App\Models\Comment;
use App\Models\News;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class NewsController extends Controller
{
    public function detail(int $newsId)
    {

        $newsItem = News::query()
            ->where('id', '=', $newsId)
            ->with('admin', 'newsCategory')
            ->firstOrFail();

        $recentNewsItemsAuthor = News::query()
            ->where('admin_id', '=', $newsItem->admin->id)
            ->orderByDesc('created_at')
            ->limit(3)
            ->get();



        $comments = Comment::query()
            ->where('news_id','=',$newsId)
            ->whereNull('feedback_comment_id')
            ->where('status','=',CommentStatus::ACCEPT->value)
            ->with([
                'user',
                'news',
                'comments' => function($query) {
                    $query
                        ->with('admin')
                        ->orderByDesc('created_at');
                }
            ])
            ->orderByDesc('created_at')
            ->get();

        return view('news.detail', [
            'title' => 'جزئیات خبر',
            'newsItem' => $newsItem,
            'recentNewsItemsAuthor' => $recentNewsItemsAuthor,
            'comments' => $comments,
        ]);

    }


    public function leaveComment(LeaveCommentPostRequest $request,string $newsId)
    {

        $news=News::findOrFail($newsId);
        $comment=$request->validated();
        $comment['news_id']=$news['id'];
        if(Auth::check()){
            $comment['user_id']=Auth::user()->id;
        }

        try {
            Comment::create($comment);
        }catch (Exception $exception){
            Log::error($exception);
            return backWithError('خطا در ارسال نظر');
        }
        return redirect()->route('news.detail',$newsId);

    }

}
