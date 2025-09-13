@extends('layouts.app')

@section('content')


    <!-- Start Section-->
    <section class="relative md:py-24 py-16">
        <div class="container relative">
            <div class="grid md:grid-cols-12 grid-cols-1 items-center gap-[30px]">
                <div class="lg:col-span-5 md:col-span-6">
                    <div class="grid grid-cols-12 gap-6 items-center">
                        <div class="col-span-6">
                            <div class="grid grid-cols-1 gap-6">
                                <img src="assets/images/about/ab03.jpg" class="shadow rounded-md" alt="">
                                <img src="assets/images/about/ab02.jpg" class="shadow rounded-md" alt="">
                            </div>
                        </div>

                        <div class="col-span-6">
                            <div class="grid grid-cols-1 gap-6">
                                <img src="assets/images/about/ab01.jpg" class="shadow rounded-md" alt="">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-7 md:col-span-6">
                    <div class="lg:ms-5">
                        <div class="flex mb-4">
                        <span class="text-indigo-600 text-2xl font-bold mb-0"><span
                                class="counter-value text-6xl font-bold" data-target="15">1</span>+</span>
                            <span class="self-end font-medium ms-2">تجربه <br> سالها</span>
                        </div>

                        <h3 class="mb-6 md:text-3xl text-2xl md:leading-normal leading-normal font-semibold">ما کی هستیم
                            ؟</h3>

                        <p class="text-slate-400 max-w-xl">
                            سایت خبری ما با هدف ارائه سریع و دقیق آخرین اخبار داخلی و بین‌المللی راه‌اندازی شده است. تیم ما متشکل از خبرنگاران و تحلیل‌گران حرفه‌ای، تلاش می‌کنند تا اخبار معتبر، تحلیل‌های دقیق و گزارش‌های ویژه را در اختیار مخاطبان قرار دهند.
                            ما معتقدیم که دسترسی به اطلاعات درست و به‌موقع، حق هر فرد است و با رعایت اصول بی‌طرفی و شفافیت، سعی می‌کنیم صدای شما را به دنیای اخبار برسانیم.
                            در این سایت، علاوه بر اخبار روز، می‌توانید مقالات تحلیلی، مصاحبه‌ها و گزارش‌های تصویری را نیز دنبال کنید و با دنیای پیرامون خود بهتر ارتباط برقرار کنید.
                        </p>

                        <div class="mt-6">
                            <a href="{{route('contact-us')}}"
                               class="py-2 px-5 inline-block font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white rounded-md me-2 mt-2"><i
                                    class="uil uil-envelope"></i> با ما تماس بگیرید </a>
                        </div>
                    </div>
                </div>
            </div><!--end grid-->
        </div><!--end container-->

    </section><!--end section-->
    <!-- End Section-->


    <!-- Start -->
    <section class="relative md:py-24 py-16 bg-gray-50 dark:bg-slate-800 md:pb-0 pb-0">
        <div class="container relative">
            <div class="grid grid-cols-1 pb-8 text-center">
                <h3 class="mb-6 md:text-3xl text-2xl md:leading-normal leading-normal font-semibold">تیم ما: قلب تپنده موفقیت‌های ما</h3>

                <p class="text-slate-400 max-w-xl mx-auto">


                    پشت هر داستان موفقیتی، یک تیم متعهد و پرشور ایستاده است. تیم حرفه‌ای ما در
                    <strong class="text-green-600">{{config('project.project_title')}}</strong>
                    ، موتور محرکه تمامی نوآوری‌ها، خلاقیت‌ها و دستاوردهای چشمگیر ما است. ما جمعی از متخصصان بااستعداد، خلاق و متعهد هستیم که با عشق به کارمان و اشتیاقی سوزان برای ایجاد تغییر، هر روز دور هم جمع می‌شویم تا بهترین‌ها را خلق کنیم.
                </p>
            </div><!--end grid-->

            <div class="grid md:grid-cols-12 grid-cols-1 mt-8 gap-[30px]">

                @foreach($authors as $author)
                    <div class="lg:col-span-3 md:col-span-6">
                        <div class="team p-6 rounded-md border border-gray-100 dark:border-gray-700 group bg-white dark:bg-slate-900">
                            <img src="assets/images/client/01.jpg" class="size-24 rounded-full shadow-md dark:shadow-gray-800"
                                 alt="">

                            <div class="content mt-4">
                                <a href="" class="text-lg font-medium hover:text-indigo-600 block">{{$author->first_name." ".$author->last_name}}</a>
                                <span class="text-slate-400 block">نویسنده</span>

                                <p class="text-slate-400 mt-4">
                                    تعداد مقالات منتشر شده:

                                    {{$author->news_count}}


                                </p>

                            </div>
                        </div>
                    </div>
                @endforeach

            </div><!--end grid-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- End -->

@endsection
