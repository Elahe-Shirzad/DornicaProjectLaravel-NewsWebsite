<!-- Start Navbar -->
<nav id="topnav" class="defaultscroll is-sticky">
    <div class="container relative">
        <!-- Logo container-->
        <a class="logo" href="{{route('index')}}">
                    <span class="inline-block dark:hidden">
                        <img src="{{asset('assets/images/logo-dark.png')}}" class="l-dark" height="24" alt="">
                        <img src="{{asset('assets/images/logo-light.png')}}" class="l-light" height="24" alt="">
                    </span>
            <img src="{{asset('assets/images/logo-light.png')}}" height="24" class="hidden dark:inline-block" alt="">
        </a>

        <!-- End Logo container-->
        <div class="menu-extras">
            <div class="menu-item">
                <!-- Mobile menu toggle-->
                <a class="navbar-toggle" id="isToggle" onclick="toggleMenu()">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
                <!-- End mobile menu toggle-->
            </div>
        </div>

        <!--Login button Start-->
        {{--        <ul class="buy-button list-none mb-0">--}}
        {{--            <li class="inline mb-0">--}}
        {{--                <a href="">--}}
        {{--                    <span class="login-btn-primary"><span--}}
        {{--                            class="size-9 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-base text-center rounded-full bg-indigo-600/5 hover:bg-indigo-600 border border-indigo-600/10 hover:border-indigo-600 text-indigo-600 hover:text-white"><i--}}
        {{--                                data-feather="settings" class="size-4"></i></span></span>--}}
        {{--                    <span class="login-btn-light"><span--}}
        {{--                            class="size-9 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-base text-center rounded-full bg-gray-50 hover:bg-gray-200 dark:bg-slate-900 dark:hover:bg-gray-700 border hover:border-gray-100 dark:border-gray-700 dark:hover:border-gray-700"><i--}}
        {{--                                data-feather="settings" class="size-4"></i></span></span>--}}
        {{--                </a>--}}
        {{--            </li>--}}
        {{--        </ul>--}}
        <!--Login button End-->

        <div id="navigation">
            <!-- Navigation Menu-->
            <ul class="navigation-menu nav-light">
                <li><a href="{{route('index')}}" class="sub-menu-item">صفحه اصلی</a></li>

                <li class="has-submenu parent-menu-item">
                    <a href="javascript:void(0)">دسته بندی ها</a><span class="menu-arrow"></span>
                    <ul class="submenu">
                        @foreach(getCategoriesName() as $category)
                            <li><a href="{{route('news.category',$category['id'])}}" class="sub-menu-item">{{$category['name']}} </a></li>
                        @endforeach

                    </ul>
                </li>

                <li><a href="{{route('contact-us')}}" class="sub-menu-item">تماس با ما</a></li>
                <li><a href="{{route('about-us')}}" class="sub-menu-item">درباره ما</a></li>

                <li class="has-submenu parent-menu-item">
                    @if(auth('web')->check())
                        <a href="javascript:void(0)">حساب کاربری</a><span class="menu-arrow"></span>
                        <ul class="submenu">
                            <li>
                                <ul>
                                    <li><a href="{{route('users.dashboard')}}" class="sub-menu-item">داشبورد</a></li>
                                    <li><a href="{{route('users.account.show')}}" class="sub-menu-item">حساب کاربری</a></li>
                                    <li><a href="{{route('users.favorites.show')}}" class="sub-menu-item">لیست علاقه مندی ها</a></li>
                                    <li><a href="{{route('users.show.comment')}}" class="sub-menu-item">کامنت خبرها</a></li>
                                    <li><a href="{{route('auth.logout')}}" class="sub-menu-item">خروج</a></li>
                                </ul>
                                @else
                                    <a href="{{route('auth.login.index')}}">ورود | ثبت نام</a>
                                @endif
                            </li>
                        </ul><!--end navigation menu-->
        </div><!--end navigation-->
    </div><!--end container-->
</nav><!--end header-->
<!-- End Navbar -->
