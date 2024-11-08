@extends('layouts.dashboard')
@section('title', "Informations")
@section('content')

<div class="content content--top-nav">
  <h2 class="intro-y text-lg font-medium mt-10"> Informations </h2>
  <div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
      @if(count($investors)>0)
      <a class="btn btn-primary shadow-md mr-2" href="{{route('informations.create')}}">Create New Information</a>

      @else
      <a class="btn btn-primary shadow-md mr-2" href="{{route('investors.create')}}">Create an investor</a>

      @endif
      <div class="dropdown">
        <button class="dropdown-toggle btn px-2 box" aria-expanded="false" data-tw-toggle="dropdown">
          <span class="w-5 h-5 flex items-center justify-center">
            <i class="w-4 h-4" data-lucide="plus"></i>
          </span>
        </button>
        <div class="dropdown-menu w-40">
          <ul class="dropdown-content">
            <li>
              <a href="" class="dropdown-item">
                <i data-lucide="users" class="w-4 h-4 mr-2"></i> Add Group </a>
            </li>
            <li>
              <a href="" class="dropdown-item">
                <i data-lucide="message-circle" class="w-4 h-4 mr-2"></i> Send Message </a>
            </li>
          </ul>
        </div>
      </div>
      <div class="hidden md:block mx-auto text-slate-500">Showing 1 to 10 of 150 entries</div>
      <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
        <div class="w-56 relative text-slate-500">
          <input type="text" class="form-control w-56 box pr-10" placeholder="Search...">
          <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search"></i>
        </div>
      </div>
    </div>
    @foreach($investors as $investor)
    <div class="intro-y col-span-12 md:col-span-6">
      <div class="box">
        <div class="flex flex-col lg:flex-row items-center p-5">
    
          <div class="w-24 h-24 lg:w-12 lg:h-12 image-fit lg:mr-1">
            <a href="{{route('informations.investor', $investor->id)}}">
                <img alt="Midone - HTML investor Template" class="rounded-full" src="{{asset('assets/dashboard/images/profile-15.jpg')}}">
            </a>
          </div>
          <div class="lg:ml-2 lg:mr-auto text-center lg:text-left mt-3 lg:mt-0">
            <a href="{{route('informations.investor', $investor->id)}}" class="font-medium">{{$investor->name}}</a>
            <div class="text-slate-500 text-xs mt-0.5">
                <a href="{{route('informations.investor', $investor->id)}}" class="font-medium">{{$investor->email}}</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endforeach
    <!-- END: Pagination -->
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
      <nav class="w-full sm:w-auto sm:mr-auto">
        <ul class="pagination">
          <li class="page-item">
            <a class="page-link" href="#">
              <i class="w-4 h-4" data-lucide="chevrons-left"></i>
            </a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#">
              <i class="w-4 h-4" data-lucide="chevron-left"></i>
            </a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#">...</a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#">1</a>
          </li>
          <li class="page-item active">
            <a class="page-link" href="#">2</a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#">3</a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#">...</a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#">
              <i class="w-4 h-4" data-lucide="chevron-right"></i>
            </a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#">
              <i class="w-4 h-4" data-lucide="chevrons-right"></i>
            </a>
          </li>
        </ul>
      </nav>
      <select class="w-20 form-select box mt-3 sm:mt-0">
        <option>10</option>
        <option>25</option>
        <option>35</option>
        <option>50</option>
      </select>
    </div>
    <!-- END: Pagination -->
  </div>
</div>
@endsection