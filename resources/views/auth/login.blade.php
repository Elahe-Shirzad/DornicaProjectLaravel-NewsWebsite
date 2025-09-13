@extends('layouts.app')

@section('content')

    <section class="md:h-screen py-36 flex items-center bg-[url('../../assets/images/cta.jpg')] bg-no-repeat bg-center bg-cover">
        <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black"></div>
        <div class="container relative">
            <div class="flex justify-center">
                <div class="max-w-[400px] w-full m-auto p-6 bg-white dark:bg-slate-900 shadow-md dark:shadow-gray-800 rounded-md">
                    <a href="{{route('index')}}"><img src="{{asset('assets/images/logo-icon-64.png')}}" class="mx-auto" alt=""></a>
                    @error('errorMessage')
                    <div>
                        <p style="color: rgb(244 63 94 / var(--tw-text-opacity, 1));">
                            {{ $message }}
                        </p>
                    </div>
                    @enderror
                    <h5 class="my-6 text-xl font-semibold">ورود</h5>
                    <form
                        method="POST"
                        action="{{route('auth.login.post')}}"
                        class="text-start">
                        @csrf
                        <div class="grid grid-cols-1">
                            <div class="mb-4">
                                <label class="font-semibold" for="email">آدرس ایمیل</label>
                                <input
                                    id="email"
                                    type="email"
                                    name="email"
                                    class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0" placeholder="ایمیل خود را وارد کنید"
                                >
                                @error('email')
                                <div>
                                    <p style="color: rgb(244 63 94 / var(--tw-text-opacity, 1));">
                                        {{ $message }}
                                    </p>
                                </div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label class="font-semibold" for="password">رمز عبور:</label>
                                <input
                                    id="password"
                                    name="password"
                                    type="password"
                                    class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0" placeholder="رمز عبور خود را وارد کنید:"
                                >
                                @error('password')
                                <div>
                                    <p style="color: rgb(244 63 94 / var(--tw-text-opacity, 1));">
                                        {{ $message }}
                                    </p>
                                </div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <button
                                    type="submit"
                                    class="py-2 px-5 inline-block tracking-wide border align-middle duration-500 text-base text-center bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white rounded-md w-full"
                                >
                                    ورود
                                </button>
                            </div>

                            <div class="text-center">
                                <span class="text-slate-400 me-2">آیا حساب کاربری دارید؟</span> <a href="{{route('auth.register.index')}}" class="text-black dark:text-white font-bold inline-block">ثبت نام</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section><!--end section -->

    <div class="fixed bottom-3 end-3">
        <a href="" class="back-button size-9 inline-flex items-center justify-center tracking-wide border align-middle duration-500 text-base text-center bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white rounded-full"><i data-feather="arrow-left" class="size-4"></i></a>
    </div>

    <!-- Switcher -->
    <div class="fixed top-[30%] -right-2 z-50">
            <span class="relative inline-block rotate-90">
                <input type="checkbox" class="checkbox opacity-0 absolute" id="chk" />
                <label class="label bg-slate-900 dark:bg-white shadow dark:shadow-gray-800 cursor-pointer rounded-full flex justify-between items-center p-1 w-14 h-8" for="chk">
                    <i class="uil uil-moon text-[20px] text-yellow-500"></i>
                    <i class="uil uil-sun text-[20px] text-yellow-500"></i>
                    <span class="ball bg-white dark:bg-slate-900 rounded-full absolute top-[2px] left-[2px] size-7"></span>
                </label>
            </span>
    </div>
    <!-- Switcher -->

    <!-- LTR & RTL Mode Code -->
    <div class="fixed top-[40%] -right-3 z-50">
        <a href="" id="switchRtl">
            <span class="py-1 px-3 relative inline-block rounded-t-md -rotate-90 bg-white dark:bg-slate-900 shadow-md dark:shadow dark:shadow-gray-800 font-bold rtl:block ltr:hidden" >LTR</span>
            <span class="py-1 px-3 relative inline-block rounded-t-md -rotate-90 bg-white dark:bg-slate-900 shadow-md dark:shadow dark:shadow-gray-800 font-bold ltr:block rtl:hidden">RTL</span>
        </a>
    </div>
    <!-- LTR & RTL Mode Code -->

@endsection
