<!DOCTYPE html>
<html lang="en" class="light scroll-smooth" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>
        {{config('project.project_title')}}
        @isset($title)
            | {{$title}}
        @endisset
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Tailwind CSS Multipurpose Landing & Admin Dashboard Template">
    <meta name="keywords"
          content="agency, application, business, clean, creative, cryptocurrency, it solutions, modern, multipurpose, nft marketplace, portfolio, saas, software, tailwind css">
    <meta name="author" content="Shreethemes">
    <meta name="website" content="https://shreethemes.in">
    <meta name="email" content="support@shreethemes.in">
    <meta name="version" content="2.2.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- favicon -->
    <link rel="shortcut icon" href={{asset("assets/images/favicon.ico")}}>

    <!-- Css -->
    <!-- Main Css -->
    <link href={{asset("assets/libs/tiny-slider/tiny-slider.css")}} rel="stylesheet">
    <link href={{asset("assets/libs/@iconscout/unicons/css/line.css")}} type="text/css" rel="stylesheet">
    <link href={{asset("assets/libs/@mdi/font/css/materialdesignicons.min.css")}} rel="stylesheet" type="text/css">
    <link rel="stylesheet" href={{asset("assets/css/tailwind.css")}}>
    <link rel="stylesheet" href={{asset("assets/css/fonts.css")}}>

    @stack('style')

</head>

<body class="font-nunito text-base text-black dark:text-white dark:bg-slate-900">
<!-- Loader Start -->
<!-- <div id="preloader">
    <div id="status">
        <div class="spinner">
            <div class="double-bounce1"></div>
            <div class="double-bounce2"></div>
        </div>
    </div>
</div> -->
<!-- Loader End -->


@includeWhen(!isset($withoutHeader),'layouts.header')


    @includeWhen(!isset($withoutHero),'layouts.hero')
    @yield('content')


@includeWhen(!isset($withoutFooter),'layouts.footer')

<!-- Back to top -->
<a href="#" onclick="topFunction()" id="back-to-top"
   class="back-to-top fixed hidden text-lg rounded-full z-10 bottom-5 end-5 size-9 text-center bg-indigo-600 text-white leading-9"><i
        class="uil uil-arrow-up"></i></a>
<!-- Back to top -->

<!-- Switcher -->
<div class="fixed top-[30%] -right-2 z-50">
            <span class="relative inline-block rotate-90">
                <input type="checkbox" class="checkbox opacity-0 absolute" id="chk"/>
                <label class="label bg-slate-900 dark:bg-white shadow dark:shadow-gray-800 cursor-pointer rounded-full flex justify-between items-center p-1 w-14 h-8"
                       for="chk">
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
        <span class="py-1 px-3 relative inline-block rounded-t-md -rotate-90 bg-white dark:bg-slate-900 shadow-md dark:shadow dark:shadow-gray-800 font-bold rtl:block ltr:hidden">LTR</span>
        <span class="py-1 px-3 relative inline-block rounded-t-md -rotate-90 bg-white dark:bg-slate-900 shadow-md dark:shadow dark:shadow-gray-800 font-bold ltr:block rtl:hidden">RTL</span>
    </a>
</div>
<!-- LTR & RTL Mode Code -->

<!-- JAVASCRIPTS -->
<script src={{asset("assets/libs/tiny-slider/min/tiny-slider.js")}}></script>
<script src={{asset("assets/js/sweetalert2")}}></script>
<script src={{asset("assets/libs/feather-icons/feather.min.js")}}></script>
<script src={{asset("assets/js/plugins.init.js")}}></script>
<script src={{asset("assets/js/app.js")}}></script>
@stack('script')
<!-- JAVASCRIPTS -->
</body>
</html>
