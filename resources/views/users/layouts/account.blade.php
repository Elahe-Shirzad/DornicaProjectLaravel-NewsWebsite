@extends('layouts.app')

@section('content')

    <section class="relative lg:pb-24 pb-16">
@include('users.layouts.hero')

        <div class="container relative md:mt-24 mt-16">
            <div class="md:flex">
@include('users.layouts.sidebar')

                @yield('account-content')
            </div><!--end grid-->
        </div><!--end container-->
    </section><!--end section-->

@endsection
