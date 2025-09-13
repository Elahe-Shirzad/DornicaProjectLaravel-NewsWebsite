@extends('layouts.app')

@section('content')

    <body class="font-nunito text-base text-black dark:text-white dark:bg-slate-900">
    <!-- Loader Start -->
    <!-- <div id="preloader">
        <div id="status">
            <div class="spinner">
                <div class="double-bounce1"></div>
                <div class="double-bounce2"></div>
            </div>
        </div>
    </div> -->
    <!-- Loader End -->

    <section
        class="min-h-screen py-36 flex items-center justify-center bg-[url('../../assets/images/cta.jpg')] bg-no-repeat bg-center bg-cover relative">
        <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black"></div>
        <div class="container relative">
            <div class="flex justify-center">
                <div
                    class="max-w-2xl w-full m-auto p-6 bg-white dark:bg-slate-900 shadow-md dark:shadow-gray-800 rounded-md">
                    <a href="{{route('index')}}"><img
                            src={{asset("assets/images/logo-icon-64.png")}} class="mx-auto" alt=""></a>
                    <h5 class="my-6 text-xl font-semibold">فرم ثبت نام</h5>
                    @error('errorMessage')
                    <div>
                        <p style="color: rgb(244 63 94 / var(--tw-text-opacity, 1));">
                            {{ $message }}
                        </p>
                    </div>
                    @enderror
                    <form
                        action="{{route('auth.register.post')}}"
                        method="POST"
                        class="text-start"
                        enctype="multipart/form-data"
                    >
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 justify-between gap-4">
                            <div class="space-y-4">
                                <div>
                                    <label class="font-semibold" for="first_name">نام* :</label>
                                    <input
                                        id="first_name"
                                        name="first_name"
                                        type="text"
                                        value="{{old('first_name')}}"
                                        class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800
                                    dark:focus:border-indigo-600 focus:ring-0" placeholder="نام خود را وارد کنید"
                                    >
                                    @error('first_name')
                                    <div>
                                        <p style="color: rgb(244 63 94 / var(--tw-text-opacity, 1));">
                                            {{ $message }}
                                        </p>
                                    </div>
                                    @enderror
                                </div>

                                <div>
                                    <label class="font-semibold" for="gender">جنسیت* :</label>
                                    <select
                                        id="gender"
                                        name="gender"
                                        class="appearance-none mt-3 w-full py-2 px-3 h-10 bg-transparent
                   dark:bg-slate-900 dark:text-slate-200 rounded outline-none
                   border border-gray-200 focus:border-indigo-600
                   dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0 pr-8"
                                    >
                                        {{--                                        <option>یک جنسیت را انتخاب کنید</option>--}}
                                        <option
                                            value="{{\App\Enums\GenderStatus::FEMALE->value}}"
                                        >
                                            زن
                                        </option>
                                        <option
                                            value="{{\App\Enums\GenderStatus::MALE->value}}"
                                        >
                                            مرد
                                        </option>
                                    </select>
                                    @error('gender')
                                    <div>
                                        <p style="color: rgb(244 63 94 / var(--tw-text-opacity, 1));">
                                            {{ $message }}
                                        </p>
                                    </div>
                                    @enderror
                                </div>

                                <div>
                                    <label class="font-semibold" for="national_code">کد ملی* :</label>
                                    <input
                                        id="national_code"
                                        name="national_code"
                                        type="text"
                                        value="{{old('national_code')}}"
                                        class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800
                                    dark:focus:border-indigo-600 focus:ring-0" placeholder="کد ملی خود را وارد کنید"
                                    >
                                    @error('national_code')
                                    <div>
                                        <p style="color: rgb(244 63 94 / var(--tw-text-opacity, 1));">
                                            {{ $message }}
                                        </p>
                                    </div>
                                    @enderror
                                </div>

                            </div>
                            <div class="space-y-4">

                                <div>
                                    <label class="font-semibold" for="last_name">نام خانوادگی* :</label>
                                    <input
                                        id="last_name"
                                        name="last_name"
                                        type="text"
                                        value="{{old('last_name')}}"
                                        class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800
                                    dark:focus:border-indigo-600 focus:ring-0"
                                        placeholder="نام خانوادگی خود را وارد کنید"
                                    >
                                    @error('last_name')
                                    <div>
                                        <p style="color: rgb(244 63 94 / var(--tw-text-opacity, 1));">
                                            {{ $message }}
                                        </p>
                                    </div>
                                    @enderror
                                </div>

                                <div>
                                    <label class="font-semibold" for="mobile">شماره موبایل* :</label>
                                    <input
                                        id="mobile"
                                        name="mobile"
                                        type="text"
                                        value="{{old('mobile')}}"
                                        class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800
                                    dark:focus:border-indigo-600 focus:ring-0"
                                        placeholder="شماره موبایل خود را وارد کنید"
                                    >
                                    @error('mobile')
                                    <div>
                                        <p style="color: rgb(244 63 94 / var(--tw-text-opacity, 1));">
                                            {{ $message }}
                                        </p>
                                    </div>
                                    @enderror
                                </div>

                                <div>
                                    <label class="font-semibold" for="military_service_status">وضعیت نظام وظیفه
                                        :</label>
                                    <select
                                        id="military_service_status"
                                        name="military_service_status"
                                        class="appearance-none mt-3 w-full py-2 px-3 h-10 bg-transparent
                   dark:bg-slate-900 dark:text-slate-200 rounded outline-none
                   border border-gray-200 focus:border-indigo-600
                   dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0 pr-8"
                                    >
                                        <option>یک وضعیت را انتخاب کنید</option>
                                        <option
                                            value="{{\App\Enums\MilitaryServiceStatus::ACTIVE->value}}"
                                        >
                                            درحال خدمت
                                        </option>
                                        <option
                                            value="{{\App\Enums\MilitaryServiceStatus::EXEMPT->value}}"
                                        >
                                            معاف
                                        </option>
                                        <option
                                            value="{{\App\Enums\MilitaryServiceStatus::COMPLETION->value}}"
                                        >
                                            پایان خدمت
                                        </option>
                                    </select>
                                    @error('military_service_status')
                                    <div>
                                        <p style="color: rgb(244 63 94 / var(--tw-text-opacity, 1));">
                                            {{ $message }}
                                        </p>
                                    </div>
                                    @enderror
                                </div>

                            </div>
                            <div class="space-y-4">

                                <div>
                                    <label class="font-semibold" for="username">نام کاربری* :</label>
                                    <input
                                        id="username"
                                        name="username"
                                        type="text"
                                        value="{{old('username')}}"
                                        class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800
                                    dark:focus:border-indigo-600 focus:ring-0" placeholder="نام کاربری خود را وارد کنید"
                                    >
                                    @error('username')
                                    <div>
                                        <p style="color: rgb(244 63 94 / var(--tw-text-opacity, 1));">
                                            {{ $message }}
                                        </p>
                                    </div>
                                    @enderror
                                </div>

                                <div>
                                    <label class="font-semibold" for="password">رمز عبور* :</label>
                                    <input
                                        id="password"
                                        name="password"
                                        type="password"
                                        class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800
                                    dark:focus:border-indigo-600 focus:ring-0" placeholder="رمز عبور خود را وارد کنید"
                                    >
                                    @error('password')
                                    <div>
                                        <p style="color: rgb(244 63 94 / var(--tw-text-opacity, 1));">
                                            {{ $message }}
                                        </p>
                                    </div>
                                    @enderror
                                </div>

                            </div>

                            <div class="space-y-4">

                                <div>
                                    <label class="font-semibold" for="email">ایمیل* :</label>
                                    <input
                                        id="email"
                                        name="email"
                                        type="email"
                                        value="{{old('email')}}"
                                        class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800
                                    dark:focus:border-indigo-600 focus:ring-0" placeholder="ایمیل خود را وارد کنید"
                                    >
                                    @error('email')
                                    <div>
                                        <p style="color: rgb(244 63 94 / var(--tw-text-opacity, 1));">
                                            {{ $message }}
                                        </p>
                                    </div>
                                    @enderror
                                </div>

                                <div>
                                    <label class="font-semibold" for="password">تکرار رمز عبور :</label>
                                    <input
                                        id="password"
                                        name="password_confirmation"
                                        type="password"
                                        class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800
                                    dark:focus:border-indigo-600 focus:ring-0"
                                    >
                                </div>

                            </div>


                            <div class="space-y-4">
                                <div>
                                    <label class="font-semibold">کد امنیتی :</label>
                                    <div class="flex items-center gap-3 mt-3">
                                    <span
                                        class="px-4 py-2 bg-gray-200 dark:bg-slate-800 rounded-md text-lg font-bold tracking-widest select-none">
                                               {{ $captcha }}
                                    </span>
                                        <a href="{{ route('auth.register.index') }}"
                                           class="text-indigo-600 hover:text-indigo-800 text-xl">🔄 </a>
                                    </div>
                                    <input
                                        id="captcha"
                                        name="captcha"
                                        type="text"
                                        value="{{ old('captcha') }}"
                                        class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded
                   outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800
                   dark:focus:border-indigo-600 focus:ring-0"
                                        placeholder="کد امنیتی بالا را وارد کنید"
                                    >
                                    @error('captcha')
                                    <div>
                                        <p class="text-rose-500">
                                            {{ $message }}
                                        </p>
                                    </div>
                                    @enderror
                                </div>
                            </div>


                            <div class="mt-8">
                                <button type="submit"
                                        class="py-2 px-5 inline-block tracking-wide border align-middle duration-500 text-base text-center bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white rounded-md w-full">
                                    ثبت نام
                                </button>
                                <div class="text-center mt-6">
                                    <span class="text-slate-400 me-2">آیا حساب کاربری دارید؟ </span> <a
                                        href="{{route('auth.login.index')}}"
                                        class="text-black dark:text-white font-bold inline-block">ورود</a>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section><!--end section -->

    <div class="fixed bottom-3 end-3">
        <a href=""
           class="back-button size-9 inline-flex items-center justify-center tracking-wide border align-middle duration-500 text-base text-center bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white rounded-full"><i
                data-feather="arrow-left" class="size-4"></i></a>
    </div>

    <!-- Switcher -->
    <div class="fixed top-[30%] -right-2 z-50">
            <span class="relative inline-block rotate-90">
                <input type="checkbox" class="checkbox opacity-0 absolute" id="chk"/>
                <label
                    class="label bg-slate-900 dark:bg-white shadow dark:shadow-gray-800 cursor-pointer rounded-full flex justify-between items-center p-1 w-14 h-8"
                    for="chk">
                    <i class="uil uil-moon text-[20px] text-yellow-500"></i>
                    <i class="uil uil-sun text-[20px] text-yellow-500"></i>
                    <span
                        class="ball bg-white dark:bg-slate-900 rounded-full absolute top-[2px] left-[2px] size-7"></span>
                </label>
            </span>
    </div>
    <!-- Switcher -->

    <!-- LTR & RTL Mode Code -->
    <div class="fixed top-[40%] -right-3 z-50">
        <a href="" id="switchRtl">
            <span
                class="py-1 px-3 relative inline-block rounded-t-md -rotate-90 bg-white dark:bg-slate-900 shadow-md dark:shadow dark:shadow-gray-800 font-bold rtl:block ltr:hidden">LTR</span>
            <span
                class="py-1 px-3 relative inline-block rounded-t-md -rotate-90 bg-white dark:bg-slate-900 shadow-md dark:shadow dark:shadow-gray-800 font-bold ltr:block rtl:hidden">RTL</span>
        </a>
    </div>
    <!-- LTR & RTL Mode Code -->

@endsection

