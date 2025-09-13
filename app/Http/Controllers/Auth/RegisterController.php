<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterPostRequest;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;

class RegisterController extends Controller
{
    public function index()
    {
        $captcha = rand(100000, 99999999);

        session(['captcha_code' => $captcha]);



        return view('auth.register',[
            'title'=>'ثبت نام',
            'withoutHeader'=>true,
            'withoutHero'=>true,
            'withoutFooter'=>true,
            'captcha'=>$captcha

        ]);
    }

    public function post(RegisterPostRequest $request)
    {
        $plainPassword = $request->password;
        $inputs=$request->only([
            'first_name',
            'last_name',
            'national_code',
            'gender',
            'email',
            'mobile',
            'username',
            'password',
            'military_service_status',
        ]);
        $inputs['password']=Hash::make($inputs['password']);

        if ($request->captcha != session('captcha_code')) {
            return backWithError( 'کد امنیتی اشتباه است.');
        }
        try{
            $user=User::create($inputs);
            Mail::to($user->email)->send(new WelcomeMail($user->username, $plainPassword));

        }catch (Exception $exception){
            Log::error($exception);
            return backWithError('خطا در ثبت نام، لطفا مجدد تلاش کنید');
        }



        return  redirect()->route('auth.login.index');
    }
}
