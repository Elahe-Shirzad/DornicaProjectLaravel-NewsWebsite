@extends('layouts.app')

@section('content')

    <!-- Start Section-->
    <section class="relative md:py-24 py-16">
        <div class="container relative">


            <div class="mb-10">
                <div class="py-3 px-2 bg-gray-400 dark:bg-slate-800 rounded-md shadow dark:shadow-gray-800 mt-6">
                    <form
                        action="{{route('index')}}"
                        method="GET"
                        class="flex justify-between items-center gap-4">
                        <!-- Select Option - سمت راست -->
                        <div class="w-72 flex items-center gap-2">
                            <label for="sort" class="text-white dark:text-slate-200 font-medium">مرتب‌سازی:</label>
                            <select
                                id="sort"
                                name="sort"
                                class="w-full  h-[50px] ps-4 pe-10 rounded-full bg-white dark:bg-slate-900 border border-gray-200 dark:border-gray-700 text-slate-600 dark:text-slate-300 focus:outline-none focus:border-indigo-600"
                                onchange="this.form.submit()"
                            >
                                <option>مرتب‌سازی بر اساس</option>
                                <option value="newest" @selected(isSortSelected('newest',true))>
                                    جدیدترین
                                </option>
                                <option value="oldest" @selected(isSortSelected('oldest'))>
                                    قدیمی‌ترین
                                </option>
                                <option value="title_asc"@selected(isSortSelected('title_asc'))>
                                    (الف-ی) بر اساس عنوان
                                </option>
                                <option value="title_desc"@selected(isSortSelected('title_desc'))>
                                    (ی-الف) بر اساس عنوان
                                </option>
                            </select>
                        </div>

                        <!-- Input Search - سمت چپ -->
                        <div class="w-1/3 relative">
                            <input
                                type="text"
                                id="search"
                                name="search"
                                value="{{request()->query('search')}}"
                                placeholder="جستجو در خبرها..."
                                class="w-full h-[50px] ps-6 pe-12 rounded-full bg-white dark:bg-slate-900 border border-gray-200 dark:border-gray-700 text-slate-600 dark:text-slate-300 focus:outline-none focus:border-indigo-600">

                            <!-- دکمه سابمیت با آیکون -->
                            <button type="submit"
                                    class="absolute top-1/2 end-3 -translate-y-1/2 text-indigo-600 hover:text-indigo-700">
                                <i class="uil uil-search text-xl"></i>
                            </button>
                        </div>

                    </form>
                </div>
            </div>


            <div class="mb-10">
                <div class="py-3 px-2 dark:bg-slate-800 rounded-md  font-extrabold text-3xl mt-6">
                    <i class="uil uil-list-ul text-[20px] me-2 align-middle"></i>
                    اخبار
                    {{$category->name}}
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 md:grid-cols-2 gap-[30px]">
                @forelse($newsItems as $newsItem)
                    <div class="blog relative rounded-md shadow dark:shadow-gray-800 overflow-hidden">
                        <img src="{{asset("assets/images/blog/01.jpg")}}" alt="">

                        <div class="content p-6">
                            <a href="{{route('news.detail',$newsItem->id)}}"
                               class="title h5 text-lg font-medium hover:text-indigo-600 duration-500 ease-in-out">
                                {{$newsItem->title}}
                            </a>
                            <p class="text-slate-400 mt-3">
                                {{Str::limit($newsItem->abstract, 80) }}
                            </p>

                            <div class="mt-4 flex justify-between">
                                <div>
                                    <a href="{{route('news.detail',$newsItem->id)}}"
                                       class="relative inline-block tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:duration-500 font-normal hover:text-indigo-600 after:bg-indigo-600 duration-500 ease-in-out">بیشتر
                                        بخوانید<i class="uil uil-arrow-left"></i></a>
                                </div>
                                <div class="text-gray-500">
                                    {{ dateTimeWithMonthName($newsItem->created_at)}} -
                                    {{$newsItem->created_at->format('H:i')}}

                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p>برای این دسته بندی هنوز خبری ثبت نشده است</p>
                @endforelse

                <!--blog end-->

            </div>
            <!--end grid-->
            <!--Paginate-->


            @if ($newsItems->hasPages())
                <div class="grid md:grid-cols-12 grid-cols-1 mt-8">
                    <div class="md:col-span-12 text-center">
                        <nav aria-label="Page navigation example">
                            <ul class="inline-flex items-center -space-x-px">
                                {{-- Previous Page Link --}}
                                @if ($newsItems->onFirstPage())
                                    <li>
                            <span
                                class="size-[40px] inline-flex justify-center items-center text-slate-400 bg-white dark:bg-slate-900 rounded-s-lg border border-gray-100 dark:border-gray-700 cursor-not-allowed">
                                <i class="uil uil-angle-left text-[20px] rtl:rotate-180 rtl:-mt-1"></i>
                            </span>
                                    </li>
                                @else
                                    <li>
                                        <a href="{{ $newsItems->previousPageUrl() }}"
                                           class="size-[40px] inline-flex justify-center items-center text-slate-400 bg-white dark:bg-slate-900 rounded-s-lg hover:text-white border border-gray-100 dark:border-gray-700 hover:border-indigo-600 dark:hover:border-indigo-600 hover:bg-indigo-600 dark:hover:bg-indigo-600">
                                            <i class="uil uil-angle-left text-[20px] rtl:rotate-180 rtl:-mt-1"></i>
                                        </a>
                                    </li>
                                @endif

                                {{-- Pagination Elements --}}
                                @foreach ($newsItems->getUrlRange(1, $newsItems->lastPage()) as $page => $url)
                                    @if ($page == $newsItems->currentPage())
                                        <li>
                                <span aria-current="page"
                                      class="z-10 size-[40px] inline-flex justify-center items-center text-white bg-indigo-600 border border-indigo-600">{{ $page }}</span>
                                        </li>
                                    @else
                                        <li>
                                            <a href="{{ $url }}"
                                               class="size-[40px] inline-flex justify-center items-center text-slate-400 hover:text-white bg-white dark:bg-slate-900 border border-gray-100 dark:border-gray-700 hover:border-indigo-600 dark:hover:border-indigo-600 hover:bg-indigo-600 dark:hover:bg-indigo-600">{{ $page }}</a>
                                        </li>
                                    @endif
                                @endforeach

                                {{-- Next Page Link --}}
                                @if ($newsItems->hasMorePages())
                                    <li>
                                        <a href="{{ $newsItems->nextPageUrl() }}"
                                           class="size-[40px] inline-flex justify-center items-center text-slate-400 bg-white dark:bg-slate-900 rounded-e-lg hover:text-white border border-gray-100 dark:border-gray-700 hover:border-indigo-600 dark:hover:border-indigo-600 hover:bg-indigo-600 dark:hover:bg-indigo-600">
                                            <i class="uil uil-angle-right text-[20px] rtl:rotate-180 rtl:-mt-1"></i>
                                        </a>
                                    </li>
                                @else
                                    <li>
                            <span
                                class="size-[40px] inline-flex justify-center items-center text-slate-400 bg-white dark:bg-slate-900 rounded-e-lg border border-gray-100 dark:border-gray-700 cursor-not-allowed">
                                <i class="uil uil-angle-right text-[20px] rtl:rotate-180 rtl:-mt-1"></i>
                            </span>
                                    </li>
                                @endif
                            </ul>
                        </nav>
                    </div>
                </div>
            @endif

        </div><!--end container-->
    </section>
    <!--end section-->
    <!-- End -->

@endsection
