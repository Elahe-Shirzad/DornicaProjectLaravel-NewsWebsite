@extends('layouts.app')

@section('content')

    <section class="md:h-screen flex py-36 w-full items-center bg-[url('../../assets/images/cta.jpg')] bg-center bg-no-repeat bg-cover">
        <div class="absolute inset-0 bg-black/70"></div>
        <div class="container relative">
            <div class="lg:flex justify-center mt-12">
                <div class="lg:w-11/12 bg-white dark:bg-slate-900 rounded-md shadow-lg dark:shadow-gray-800 overflow-hidden">
                    <div class="grid md:grid-cols-12 grid-cols-1 items-center">
                        <div class="lg:col-span-7 md:col-span-6">
                            <div class="w-full leading-[0] border-0">
                                <img src="{{asset('assets/images/blog/02.jpg')}}"  alt="" style="border:0" class="w-full lg:h-[540px] md:h-[600px] h-[200px]" allowfullscreen></img>
                            </div>
                        </div>

                        <div class="lg:col-span-5 md:col-span-6">
                            <div class="p-6">
                                <h3 class="mb-6 text-2xl leading-normal font-medium">سایت خبری آپدیت نیوز</h3>
                                <p class="text-slate-400">از طریق کانال های زیر با ما در ارتباط باشید و نظرهایتان را با ما به اشتراک بگذارید</p>

                                <div class="flex items-center mt-6">
                                    <i data-feather="mail" class="size-4 me-4"></i>
                                    <div class="">
                                        <h5 class="title font-bold mb-0">ایمیل</h5>
                                        <a href="mailto:contact@example.com" class="relative inline-block font-semibold tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:duration-500 text-indigo-600 hover:text-indigo-600 after:bg-indigo-600 duration-500 ease-in-out">contact@example.com</a>
                                    </div>
                                </div>

                                <div class="flex items-center mt-6">
                                    <i data-feather="phone" class="size-4 me-4"></i>
                                    <div class="">
                                        <h5 class="title font-bold mb-0">شماره تلفن</h5>
                                        <a href="tel:+152534-468-854" class="relative inline-block font-semibold tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:duration-500 text-indigo-600 hover:text-indigo-600 after:bg-indigo-600 duration-500 ease-in-out">+152 534-468-854</a>
                                    </div>
                                </div>

                                <div class="flex items-center mt-6">
                                    <i data-feather="map-pin" class="size-4 me-4"></i>
                                    <div class="">
                                        <h5 class="title font-bold mb-0">آدرس</h5>
                                        <span  class="video-play-icon relative inline-block font-semibold tracking-wide align-middle ease-in-out text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:duration-500 text-indigo-600 hover:text-indigo-600 after:bg-indigo-600 duration-500 lightbox">ساری، کمربندی غربی، قبل از کوی اصحاب</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div><!--end grid-->
        </div><!--end container-->
    </section><!--end section-->


@endsection
