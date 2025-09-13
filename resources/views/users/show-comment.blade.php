@extends('users.layouts.account')

@section('account-content')
    <div class="lg:col-span-3 md:col-span-9 w-full">
        <div class="p-6 bg-white dark:bg-slate-900 shadow dark:shadow-gray-800 rounded-md w-full">

            <div id="order" role="tabpanel" aria-labelledby="order-tab" class="w-full">
                <div class="relative overflow-x-auto shadow dark:shadow-gray-800 rounded-md w-full">
                    <table class="w-full text-start text-slate-500 dark:text-slate-400">
                        @if(count($showUserComments) > 0)
                            <thead class="text-sm uppercase bg-slate-50 dark:bg-slate-800">
                            <tr class="text-start">
                                <th scope="col" class="px-2 py-3 text-start"> ثبت تاریخ</th>
                                <th scope="col" class="px-2 py-3 text-start">متن پیام</th>
                                <th scope="col" class="px-2 py-3 text-start">وضعیت</th>
                                <th scope="col" class="px-2 py-3 text-start">عنوان مقاله</th>
                                <th scope="col" class="px-2 py-3 text-start">عمل</th>
                            </tr>
                            </thead>
                        @endif
                        <tbody>
                        @forelse($showUserComments as $comment)

                            <tr class="bg-white dark:bg-slate-900 text-start">
                                <th class="px-2 py-3 text-start"
                                    scope="row">{{dateTimeWithMonthName($comment->created_at)}}</th>
                                <td class="px-2 py-3 text-start">{{Str::limit($comment->content, 20) }}</td>
                                @switch($comment->status)
                                    @case (\App\Enums\CommentStatus::PENDING)
                                        <td class="px-2 py-3 text-start text-yellow-500">در حال بررسی</td>
                                        @break
                                    @case (\App\Enums\CommentStatus::ACCEPT)
                                        <td class="px-2 py-3 text-start text-green-600">پذیرفته شده</td>
                                        @break
                                    @case (\App\Enums\CommentStatus::REJECT)
                                        <td class="px-2 py-3 text-start text-red-600">پذیرفته نشده</td>
                                        @break
                                @endswitch

                                <td class="px-2 py-3 text-start">{{$comment->news->title}}</td>
                                <td class="px-2 py-3 text-start"><a href="{{route('news.detail',$comment->news_id)}}"
                                                                    class="text-indigo-600"> جزئیات خبر<i
                                            class="uil uil-arrow-left"></i></a></td>
                            </tr>

                        @empty
                            <tr class="bg-white dark:bg-slate-900 text-start">
                                <th class="px-2 py-3 text-start" scope="row">
                                    این کاربر هنوز برای مقاله ای نظر ثبت نکرده است.
                                </th>
                            </tr>
                        @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
