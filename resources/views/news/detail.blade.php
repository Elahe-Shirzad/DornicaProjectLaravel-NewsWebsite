@extends('layouts.app')

@section('content')

    <!-- Start Section-->
    <section class="relative md:py-24 py-16">
        <div class="container relative">
            <div class="grid grid-cols-1">
                <div class="tiny-single-item">
                    <div class="tiny-slide">
                        <div class="m-2">
                            <img src="{{asset("assets/images/portfolio/16.jpg")}}" class="rounded-md shadow dark:shadow-gray-800" alt="">
                        </div>
                    </div>
                    <div class="tiny-slide">
                        <div class="m-2">
                            <img src="{{asset("assets/images/portfolio/17.jpg")}}" class="rounded-md shadow dark:shadow-gray-800" alt="">
                        </div>
                    </div>
                    <div class="tiny-slide">
                        <div class="m-2">
                            <img src="{{asset("assets/images/portfolio/18.jpg")}}" class="rounded-md shadow dark:shadow-gray-800" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container relative md:mt-24 mt-16">
            <div class="grid md:grid-cols-12 grid-cols-1 gap-[30px]">

                <div class="lg:col-span-8 md:col-span-7">
                    <div class="lg:me-5">
                        <h3 class="text-xl font-semibold mb-3 border-b border-gray-100 dark:border-gray-700 pb-3">
                            {{$newsItem->title}}
                        </h3>
                        <h6 class="text-xl font-semibold mb-3 border-b border-gray-100 dark:border-gray-700 pb-3 text-gray-500">چکیده خبر</h6>
                        <p class="text-slate-400 italic border-x-4 border-indigo-600 rounded-ss-xl rounded-ee-xl mt-3 p-3">
                            {{$newsItem->abstract}}

                        </p>
                        <p class="mt-4 text-gray-500">
                            {{$newsItem->description}}
                        </p>
                    </div>

                    <div class="p-6 rounded-md shadow dark:shadow-gray-400 mt-8">
                        <h5 class="text-lg font-semibold">نظرات:</h5>

                        @forelse($comments as $comment)

                            <div class="mt-8">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <img src="{{asset('assets/images/client/02.jpg')}}" class="size-11 rounded-full shadow" alt="">

                                        <div class="ms-3 flex-1">
                                            <p class="text-lg font-semibold hover:text-indigo-600 duration-500">
                                                    @if(is_null($comment->user_id))
                                                       ناشناس
                                                    @else
                                                       {{$comment->user->first_name." ".$comment->user->last_name}}
                                                    @endif

                                            </p>
                                            <p class="text-sm text-slate-400">{{dateTimeWithMonthName($comment->created_at)}}</p>
                                        </div>
                                    </div>

                                </div>
                                <div class="p-4 bg-gray-50 dark:bg-slate-800 rounded-md shadow dark:shadow-gray-800 mt-6">
                                    <div class="p-4  bg-gray-50 dark:bg-slate-800 rounded-md shadow dark:shadow-gray-800 mt-6">
                                        <p class="text-slate-400 italic">

                                            {{$comment->content}}
                                        </p>
                                    </div>


                                    @forelse($comment->comments as $reply)
                                        <div class="mt-8 ms-8">
                                            <div class="flex items-center justify-between">
                                                <div class="flex items-center">
                                                    <img src="{{asset('assets/images/client/02.jpg')}}" class="size-11 rounded-full shadow" alt="">

                                                    <div class="ms-3 flex-1">
                                                        <p class="text-lg font-semibold hover:text-indigo-600 duration-500">
                                                            @if(is_null($reply->admin_id))
                                                                مدیر
                                                            @else
                                                                {{$reply->admin->first_name." ".$reply->admin->last_name}}
                                                            @endif
                                                        </p>
                                                        <p class="text-sm text-slate-400">{{dateTimeWithMonthName($reply->created_at)}}</p>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="p-4 bg-gray-50 dark:bg-slate-800 rounded-md shadow dark:shadow-gray-800 mt-6">
                                                <p class="text-slate-400 italic">
                                                    پاسخ دیدگاه:
                                                    {{$reply->content}}
                                                </p>
                                            </div>
                                        </div>
                                    @empty
                                    @endforelse

                                </div>

                            </div>

                        @empty
                            <p>برای این خبر دیدگاهی ثبت نشده است</p>
                        @endforelse

                    </div>

                    <div class="p-6 rounded-md shadow dark:shadow-gray-800 mt-8">
                        @error('errorMessage ')
                        <div>
                            <p style="color: rgb(244 63 94 / var(--tw-text-opacity, 1));">
                                {{ $message }}
                            </p>
                        </div>
                        @enderror
                        <h5 class="text-lg font-semibold">پیام بگذارید:</h5>

                        <form
                            class="mt-8"
                            action="{{route('news.leaveComment',$newsItem->id)}}"
                            method="POST"
                        >
                            @csrf
                            <div class="grid lg:grid-cols-12 lg:gap-6">
                                <div class="lg:col-span-6 mb-5">
                                    <div class="text-start">
                                        <label for="name" class="font-semibold">اسم شما:</label>
                                        <div class="form-icon relative mt-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user size-4 absolute top-3 start-4"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                            <input
                                                name="name"
                                                id="name"
                                                type="text"
                                                value="{{old('name')}}"
                                                class="form-input
                                                ps-11 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0" placeholder="نام :"
                                            >
                                            @error('name')
                                            <div>
                                                <p style="color: rgb(244 63 94 / var(--tw-text-opacity, 1));">
                                                    {{ $message }}
                                                </p>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="lg:col-span-6 mb-5">
                                    <div class="text-start">
                                        <label for="email" class="font-semibold">ایمیل شما:</label>
                                        <div class="form-icon relative mt-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail size-4 absolute top-3 start-4"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                            <input
                                                name="email"
                                                id="email"
                                                type="email"
                                                value="{{old('email')}}"
                                                class="form-input ps-11 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0" placeholder="ایمیل :"
                                            >
                                            @error('email')
                                            <div>
                                                <p style="color: rgb(244 63 94 / var(--tw-text-opacity, 1));">
                                                    {{ $message }}
                                                </p>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-1">
                                <div class="mb-5">
                                    <div class="text-start">
                                        <label for="content" class="font-semibold">نظر شما:</label>
                                        <div class="form-icon relative mt-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-circle size-4 absolute top-3 start-4"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>
                                            <textarea
                                                name="content"
                                                id="content"
                                                class="form-input ps-11 w-full py-2 px-3 h-28 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0" placeholder="پیام :"
                                            ></textarea>
                                            @error('content')
                                            <div>
                                                <p style="color: rgb(244 63 94 / var(--tw-text-opacity, 1));">
                                                    {{ $message }}
                                                </p>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if(auth('web')->check())
                            <input type="hidden" name="user_id" value="{{auth('web')->user()->id}}">
                            @endif

                            @if(auth('admin')->check())
                                <input type="hidden" name="admin_id" value="{{auth('admin')->user()->id}}">
                            @endif

                            <button type="submit" id="submit" name="send" class="py-2 px-5 inline-block tracking-wide border align-middle duration-500 text-base text-center bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white rounded-md w-full">ارسال پیام</button>
                        </form>
                    </div>

                </div><!--end col-->
                <div class="lg:col-span-4 md:col-span-5">
                    <div class="bg-gray-50 dark:bg-slate-800 shadow dark:shadow-gray-800 p-6 rounded-md">
                        <div class="text-center mt-8">
                            <img src="{{asset("assets/images/client/05.jpg")}}" class="size-24 mx-auto rounded-full shadow mb-4" alt="">

                            <a href="" class="text-lg font-semibold hover:text-indigo-600 duration-500">
                                {{$newsItem->admin->first_name." ". $newsItem->admin->last_name}}
                            </a>
                            <p class="text-slate-400">نویسنده محتوا</p>
                        </div>
                        <dl class="grid grid-cols-12 mb-0 mt-3">

                            <dt class="md:col-span-4 col-span-5 mt-2">دسته بندی: </dt>
                            <dd class="md:col-span-8 col-span-7 mt-2 text-slate-400">{{$newsItem->newsCategory->name}}</dd>

                            <dt class="md:col-span-4 col-span-5 mt-2">تاریخ درج:</dt>
                            <dd class="md:col-span-8 col-span-7 mt-2 text-slate-400">{{dateTimeWithMonthName($newsItem->created_at)}}</dd>

                            <dd class="md:col-span-8 col-span-7 mt-2 text-slate-400">
                                @php
                                    $isFavorited = auth()->check() && \App\Models\Favorite::where('user_id', auth()->id())
                                        ->where('news_id', $newsItem->id)
                                        ->exists();
                                @endphp

                                <form id="favorite-form-{{$newsItem->id}}"
                                      action="{{ route('add.favorite.news') }}"
                                      method="POST"
                                      data-favorited="{{ $isFavorited ? '1' : '0' }}">
                                    @csrf
                                    <input type="hidden" name="news_id" value="{{ $newsItem->id }}"/>
                                    <button type="submit"
                                            class="py-3 whitespace-nowrap px-12 inline-block font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-red-600/20 hover:border-gray-50 text-gray-500 rounded-full">
                                        افزودن به علاقه مندی ها
                                    </button>
                                </form>
                            </dd>
                        </dl>
                    </div>

                    <div class="lg:col-span-4 md:col-span-6">
                        <div class="sticky top-20">
                            <h5 class="text-lg font-semibold bg-gray-50 dark:bg-slate-800 shadow dark:shadow-gray-800 rounded-md p-2 text-center mt-8">پست های اخیر نویسنده</h5>

                            @foreach($recentNewsItemsAuthor as $recentNewsItemAuthor)
                                <div class="flex items-center mt-8">
                                    <img src="{{asset('assets/images/portfolio/16.jpg')}}" class="h-16 rounded-md shadow dark:shadow-gray-800" alt="">

                                    <div class="ms-3">
                                        <a href="{{route('news.detail',$recentNewsItemAuthor->id)}}" class="font-semibold hover:text-indigo-600">{{$recentNewsItemAuthor->title}}</a>
                                        <p class="text-sm text-slate-400">{{dateTimeWithMonthName($recentNewsItemAuthor->created_at)}}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div><!--end col-->


            </div><!--end grid-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- End Section-->

@endsection


@push('script')

    <script>
        document.getElementById("favorite-form-{{$newsItem->id}}").addEventListener("submit", function(e) {
            e.preventDefault();
            const form = this;
            const btn = form.querySelector("button[type='submit']");
            const isFavorited = form.dataset.favorited === '1';
            const loginUrl = "{{ route('auth.login.index') }}";

            @guest
            // اگر لاگین نیست
            if (confirm("برای لایک کردن باید وارد حساب شوید. آیا می‌خواهید وارد شوید؟")) {
                window.location.href = loginUrl;
            }
            return;
            @else
            // اگر قبلاً اضافه شده
            if (isFavorited) {
                let toast = document.createElement("div");
                toast.innerText = "⚠️ شما قبلاً انتخاب کرده‌اید";
                toast.className = "fixed bottom-5 right-5 bg-yellow-500 text-white px-4 py-2 rounded-lg shadow-lg";
                document.body.appendChild(toast);
                setTimeout(() => {
                    toast.style.opacity = "0";
                    setTimeout(() => toast.remove(), 500);
                }, 2000);
                return;
            }

            // غیرفعال کردن دکمه برای جلوگیری از کلیک چندباره
            if (btn) {
                btn.disabled = true;
                btn.classList.add("opacity-70", "cursor-not-allowed");
            }

            // نمایش پیام موفقیت
            let toast = document.createElement("div");
            toast.innerText = "✅ به علاقه‌مندی‌ها اضافه شد";
            toast.className = "fixed bottom-5 right-5 bg-green-600 text-white px-4 py-2 rounded-lg shadow-lg";
            document.body.appendChild(toast);
            setTimeout(() => {
                toast.style.opacity = "0";
                setTimeout(() => toast.remove(), 500);
            }, 2000);

            // ارسال فرم بعد از 300ms برای ثبت در دیتابیس
            setTimeout(() => {
                form.submit();
            }, 300);
            @endguest
        });
    </script>



@endpush
