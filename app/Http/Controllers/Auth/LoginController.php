<?php

namespace App\Http\Controllers\Auth;

use App\Enums\UserStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginPostRequest;
use App\Models\Favorite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Mail;


class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login', [
            'title' => ' فرم ورود',
            'withoutHeader' => true,
            'withoutHero' => true,
            'withoutFooter' => true,
        ]);
    }

    public function post(LoginPostRequest $request)

    {
        $inputs = $request->validated();

        $user = User::query()
            ->where([
                'email' => $inputs['email'],
                'status' => UserStatus::ACTIVE
            ])
            ->first();

        if(!$user){
            return backWithError('اطلاعات وارد شده نامعتبر است');
        }

        if (!Hash::check($inputs['password'], $user->password)) {
            return backWithError('اطلاعات وارد شده نامعتبر است');
        }

        Auth::login($user);

        return redirect()->route('index');
    }
}
