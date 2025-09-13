@extends('users.layouts.account')

@section('account-content')


    <section class="container-fluid relative md:mt-16 mt-8 px-6">


        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
            <div class="p-6 bg-white dark:bg-slate-900 rounded-2xl shadow border border-gray-300 dark:border-gray-700 text-center">
                @if($user->status == \App\Enums\UserStatus::ACTIVE)
                    <h5 class="text-2xl font-bold text-green-600">فعال </h5>
                @else
                    <h5 class="text-2xl font-bold text-red-600">غیرفعال</h5>
                @endif
                <p class="mt-2 text-slate-500">وضعیت کاربر</p>
            </div>
            <div class="p-6 bg-white dark:bg-slate-900 rounded-2xl shadow border border-gray-300 dark:border-gray-700 text-center">
                <h5 class="text-2xl font-bold text-rose-600">{{count($favoritesNewsItems)}}</h5>
                <p class="mt-2 text-slate-500">تعداد علاقه مندی ها</p>
            </div>
            <div class="p-6 bg-white dark:bg-slate-900 rounded-2xl shadow border border-gray-300 dark:border-gray-700 text-center">
                <h5 class="text-2xl font-bold text-rose-600">{{count($showUserComments)}}</h5>
                <p class="mt-2 text-slate-500"> تعداد کامنت‌ها</p>
            </div>
        </div>


        <div class="flex justify-between items-center mb-8 ">
            <div class="flex items-center gap-2">
                <i class="uil uil-newspaper text-indigo-600 text-2xl"></i>
                <h4 class="text-xl font-bold">تازه‌ترین اخبار</h4>
            </div>
            <a href="{{route('index')}}"
               class="text-indigo-600 hover:text-indigo-800 text-sm font-semibold">
                مشاهده جدیدترین اخبار
            </a>
        </div>


        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-[30px]">
            @foreach($newsItems as $newsItem)
                <div class="blog relative rounded-2xl shadow dark:shadow-gray-800 overflow-hidden bg-white dark:bg-slate-900">
                    <img src="assets/images/blog/01.jpg" alt="" class="w-full h-48 object-cover">

                    <div class="content p-6">
                        <a href="{{route('news.detail',$newsItem->id)}}"
                           class="title h5 text-sm font-semibold hover:text-indigo-600 duration-500 ease-in-out">
                            {{$newsItem->title}}
                        </a>
                        <p class="text-slate-400 mt-3">
                            {{Str::limit($newsItem->abstract, 50)}}
                        </p>

                        <div class="mt-4 flex justify-between items-center">
                            <a href="{{route('news.detail',$newsItem->id)}}"
                               class="text-indigo-600 hover:underline text-sm">
                                بیشتر <i class="uil uil-arrow-left"></i>
                            </a>
                            <div class="text-gray-500 text-sm">
                                {{ dateTimeWithMonthName($newsItem->created_at)}}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>



@endsection

