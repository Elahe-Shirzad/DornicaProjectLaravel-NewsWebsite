<?php

namespace App\Http\Controllers;

use App\Http\Requests\FavoriteNewsStoreRequest;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function favoriteNews(FavoriteNewsStoreRequest $request)
    {

        $newsId = $request->input('news_id');

        if (!Auth::check()) {
            session()->put('redirect_after_login', url()->previous());
            return back()->with('login_required', true);
        }

        $userId = Auth::id();

        $exists = Favorite::where('user_id', $userId)
            ->where('news_id', $newsId)
            ->exists();

        if ($exists) {
            return back()->with('already_added', true);
        }

        Favorite::create([
            'user_id' => $userId,
            'news_id' => $newsId,
        ]);

        return back()->with('favorite_added', true);
    }

}
