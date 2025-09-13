@extends('users.layouts.account')

@section('account-content')


    <section class="relative md:py-24">


        <div class="grid grid-cols-1 lg:grid-cols-2 md:grid-cols-1 gap-[30px]">

            @foreach($favoritesNewsItems as $newsItem)
                <div class="blog relative rounded-md shadow dark:shadow-gray-800 overflow-hidden">
                    <form method="POST" action="{{ route('users.favorites.delete', $newsItem->news_id) }}"
                          class="absolute top-2 right-2 z-10"
                          onsubmit="return confirm('آیا از حذف این خبر از علاقه‌مندی‌ها مطمئن هستید؟')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="bg-red-600 hover:bg-red-700 text-white p-2 rounded-full shadow focus:outline-none focus:ring-2 focus:ring-red-400 transition">
                            <!-- آیکون Heroicon (Trash) -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </form>
                    <img src="{{asset('assets/images/blog/01.jpg')}}" alt="">

                    <div class="content p-6">
                        <a href="{{route('news.detail',$newsItem->news_id)}}"
                           class="title h5 text-lg font-medium hover:text-indigo-600 duration-500 ease-in-out">
                            {{$newsItem->news->title}}
                        </a>
                        <p class="text-slate-400 mt-3">
                            {{Str::limit($newsItem->news->abstract, 80) }}
                        </p>

                        <div class="mt-4 flex justify-between">
                            <div>
                                <a href="{{route('news.detail',$newsItem->news)}}"
                                   class="relative inline-block tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:duration-500 font-normal hover:text-indigo-600 after:bg-indigo-600 duration-500 ease-in-out">بیشتر
                                    بخوانید<i class="uil uil-arrow-left"></i></a>
                            </div>
                            <div class="text-gray-500">
                                {{ dateTimeWithMonthName($newsItem->news->created_at)}} -
                                {{$newsItem->news->created_at->format('H:i')}}

                            </div>
                        </div>

                    </div>
                </div>
            @endforeach

            <!--blog end-->

        </div>
        <!--end grid-->
        <!--Paginate-->


        @if ($favoritesNewsItems->hasPages())
            <div class="grid md:grid-cols-12 grid-cols-1 mt-8">
                <div class="md:col-span-12 text-center">
                    <nav aria-label="Page navigation example">
                        <ul class="inline-flex items-center -space-x-px">
                            {{-- Previous Page Link --}}
                            @if ($favoritesNewsItems->onFirstPage())
                                <li>
                            <span
                                class="size-[40px] inline-flex justify-center items-center text-slate-400 bg-white dark:bg-slate-900 rounded-s-lg border border-gray-100 dark:border-gray-700 cursor-not-allowed">
                                <i class="uil uil-angle-left text-[20px] rtl:rotate-180 rtl:-mt-1"></i>
                            </span>
                                </li>
                            @else
                                <li>
                                    <a href="{{ $favoritesNewsItems->previousPageUrl() }}"
                                       class="size-[40px] inline-flex justify-center items-center text-slate-400 bg-white dark:bg-slate-900 rounded-s-lg hover:text-white border border-gray-100 dark:border-gray-700 hover:border-indigo-600 dark:hover:border-indigo-600 hover:bg-indigo-600 dark:hover:bg-indigo-600">
                                        <i class="uil uil-angle-left text-[20px] rtl:rotate-180 rtl:-mt-1"></i>
                                    </a>
                                </li>
                            @endif

                            {{-- Pagination Elements --}}
                            @foreach ($favoritesNewsItems->getUrlRange(1, $favoritesNewsItems->lastPage()) as $page => $url)
                                @if ($page == $favoritesNewsItems->currentPage())
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
                            @if ($favoritesNewsItems->hasMorePages())
                                <li>
                                    <a href="{{ $favoritesNewsItems->nextPageUrl() }}"
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
        {{--    </div><!--end container-->--}}

    </section>


@endsection
