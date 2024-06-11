@extends('layouts.base')
@section('head')
    <meta charset="utf-8">
    <link href="dist/images/logo.svg" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <title>@yield('title') - {{config('settings.title')}}</title>
    <link rel="stylesheet" href="{{asset('assets/dashboard/css/app.css')}}" />
    @yield('sub_head')
@endsection
@section('body_class', 'py-5 md:py-0')
@section('body')
    <div id="success-notification-content" class="toastify-content hidden flex"> <i class="text-success" data-lucide="check-circle"></i>
        <div class="ml-4 mr-4">
            <div class="font-medium">Message Saved!</div>
            <div class="text-slate-500 mt-1">The message will be sent in 5 minutes.</div>
        </div>
    </div>
    @include('components.InvestorMobileMenu')
    @include('components.InvestorTopBar')
    @include('components.InvestorTopMenu')
    @yield('content')
    <!--<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=&libraries=places"></script>-->
    <script src="{{asset('assets/dashboard/js/app.js')}}" defer></script>
    <script>
        @if(Auth::guard('investor')->user()->dark)
        document.documentElement.classList.add('dark');
        @endif
        @if(Auth::guard('investor')->user()->primary_color  != null)
        document.documentElement.style.setProperty('--color-primary', '{{Auth::user()->primary_color }}');
        @endif
    </script>
    @yield('script')
@endsection