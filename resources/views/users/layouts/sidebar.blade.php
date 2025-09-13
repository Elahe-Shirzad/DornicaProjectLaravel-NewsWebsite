<div class="lg:w-1/4 md:w-1/3 md:px-3">
    <div class="relative md:-mt-48 -mt-32">
        <div class="p-6 rounded-md shadow dark:shadow-gray-800 bg-white dark:bg-slate-900">
            <div class="profile-pic text-center mb-5">
                <input id="pro-img" name="profile-image" type="file" class="hidden"
                       onchange="loadFile(event)">
                <div>
                    <div class="relative size-28 mx-auto">
                        <img src="{{asset('assets/images/client/05.jpg')}}"
                             class="rounded-full shadow dark:shadow-gray-800 ring-4 ring-slate-50 dark:ring-slate-800"
                             id="profile-image" alt="">
                        <label class="absolute inset-0 cursor-pointer" for="pro-img"></label>
                    </div>

                    <div class="mt-4">
                        <h5 class="text-lg font-semibold">{{auth()->user()->first_name.' '.auth()->user()->last_name}}</h5>
                        <p class="text-slate-400">{{auth()->user()->email}}</p>
                    </div>
                </div>
            </div>

            <div class="border-t border-gray-100 dark:border-gray-700">
                <ul class="list-none sidebar-nav mb-0 mt-3" id="navmenu-nav">
                    <li class="navbar-item account-menu">
                        <a href="{{route('users.dashboard')}}"
                           class="navbar-link text-slate-400 flex items-center py-2 rounded">
                            <span class="me-2 text-[18px] mb-0 text-slate-400"><i class="uil uil-dashboard"></i></span>
                            <h6 class="mb-0 font-semibold">داشبورد</h6>
                        </a>
                    </li>

                    <li class="navbar-item account-menu ">
                        <a href="{{route('users.show.comment')}}"
                           class="navbar-link text-slate-400 flex items-center py-2 rounded">
                            <span class="me-2 text-[18px] mb-0"><i class="uil uil-diary-alt"></i></span>
                            <h6 class="mb-0 font-semibold">کامنت های کاربر</h6>
                        </a>
                    </li>


                    <li class="navbar-item account-menu ">
                        <a href="{{route('users.favorites.show')}}"
                           class="navbar-link text-slate-400 flex items-center py-2 rounded">
                            <span class="me-2 text-[18px] mb-0"><i class="uil uil-bell"></i></span>
                            <h6 class="mb-0 font-semibold">لیست علاقه مندی ها</h6>
                        </a>
                    </li>

                    <li class="navbar-item account-menu">
                        <a href="{{route('users.account.show')}}"
                           class="navbar-link text-slate-400 flex items-center py-2 rounded">
                            <span class="me-2 text-[18px] mb-0"><i class="uil uil-setting"></i></span>
                            <h6 class="mb-0 font-semibold">تنظیمات پروفایل</h6>
                        </a>
                    </li>

                    <li class="navbar-item account-menu">
                        <a href="{{route('auth.logout')}}"
                           class="navbar-link text-slate-400 flex items-center py-2 rounded">
                            <span class="me-2 text-[18px] mb-0"><i class="uil uil-power"></i></span>
                            <h6 class="mb-0 font-semibold">خروج از سیستم</h6>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
