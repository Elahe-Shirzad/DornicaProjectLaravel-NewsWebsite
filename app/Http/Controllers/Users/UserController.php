<?php

namespace App\Http\Controllers\Users;

use App\Enums\NewsStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Users\UserUpdateRequest;
use App\Models\City;
use App\Models\Comment;
use App\Models\Favorite;
use App\Models\News;
use App\Models\Province;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        $newsItems=News::query()
            ->where('status','=',NewsStatus::PUBLISH)
            ->orderByDesc('created_at')
            ->limit(3)
            ->get();


        $favoritesNewsItems = Favorite::query()
            ->where('user_id', '=', Auth::user()->id)
            ->get();


        $showUserComments = Comment::query()
            ->where('user_id', '=', Auth::user()->id)
            ->get();

        return view('users.dashboard', [
            'title' => 'داشبورد',
            'withoutHero' => true,
            'user' => $user,
            'newsItems' => $newsItems,
            'favoritesNewsItems' => $favoritesNewsItems,
            'showUserComments' => $showUserComments,

        ]);
    }

    public function show()
    {
        $user = Auth::user();

        $cities = City::query()
            ->with('province')
            ->get();


        $provinces=Province::query()
            ->get();

        return view('users.account', [
            'title' => 'حساب کاربری',
            'withoutHero' => true,
            'user' => $user,
            'provinces'=> $provinces,
            'cities' => $cities
        ]);
    }

    public function update(UserUpdateRequest $request)
    {
        $inputs = $request
            ->only([
                'first_name',
                'last_name',
                'mobile',
                'gender',
                'email',
                'username',
                'province_id',
                'city_id',
                'national_code',
                'military_service_status',
            ]);

        if ($request->filled('password')) {
            $inputs['password'] = Hash::make($request->input('password'));
        }
        try {
            User::query()
                ->where('id', '=', Auth::id())
                ->update($inputs);
        } catch (Exception $exception) {
            Log::error($exception);
            return backWithError('خطا در ذخیره اطلاعات حساب کاربری');
        }
        return redirect()->route('users.account.show');

    }

    public function showFavorite()
    {
        $user = Auth::user();
        $favoritesNewsItems = Favorite::query()
            ->where('user_id', '=', Auth::user()->id)
            ->with([
                'news'
            ])
            ->paginate();

        return view('users.show-favorite', [
            'title' => 'لیست علاقه مندی ها',
            'withoutHero' => true,
            'user' => $user,
            'favoritesNewsItems' => $favoritesNewsItems,
        ]);
    }

    public function delete(int $newsId)
    {
        $favorite = Favorite::query()
            ->where('news_id', $newsId)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        try {

            $favorite->delete();

        } catch (Exception $exception) {
            Log::error($exception);
            return backWithError('خطا در حذف خبر');
        }
        return redirect()->route('users.favorites.show');

    }

    public function showComment()
    {
        $user = Auth::user();

        $showUserComments = Comment::query()
            ->where('user_id', '=', Auth::user()->id)
            ->with([
                'news' => function ($query) {
                    $query
                        ->where('status', '=', NewsStatus::PUBLISH)
                        ->orderByDesc('created_at');
                }
            ])
            ->orderByDesc('created_at')
            ->limit(5)
            ->get();


        return view('users.show-comment', [
            'title' => 'کامنت کاربر',
            'withoutHero' => true,
            'user' => $user,
            'showUserComments' => $showUserComments,

        ]);

    }
}
