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
@section('body')
    @include('components.MobileMenu')
    @include('components.TopBar')
    @include('components.TopMenu')
    @yield('content')
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=["your-google-map-api"]&libraries=places"></script>
    <script src="{{asset('assets/dashboard/js/app.js')}}"></script>
    @yield('script')
@endsection