@extends('layouts.investors')
@section('title', "Dashboard")
@section('content')

<div class="content content--top-nav">
  <div class="grid grid-cols-12 gap-6">
    <div class="col-span-12 2xl:col-span-9">
      <div class="grid grid-cols-12 gap-6">
        <!-- BEGIN: General Report -->
        <div class="col-span-12 mt-8">
          <div class="intro-y flex items-center h-10">
            <h2 class="text-lg font-medium truncate mr-5"> General Report </h2>
            <a href="" class="ml-auto flex items-center text-primary">
              <i data-lucide="refresh-ccw" class="w-4 h-4 mr-3"></i> Reload Data </a>
          </div>
          <div class="grid grid-cols-12 gap-6 mt-5">
            @foreach($informations as $information)
            @if($information->icon != null)
            <div class="col-span-12 col-span-{{$information->width}} lg:col-span-{{$information->width_lg}} intro-y">
              <div class="report-box zoom-in">
                <div class="box p-5">
                  <div class="flex">
                    <i data-lucide="{{$information->icon}}" class="report-box__icon text-primary"></i>
                    <div class="ml-auto">
                      <div class="report-box__indicator bg-{{$information->color}} tooltip cursor-pointer"> {{$information->change}} <i data-lucide="chevron-{{$information->color=='success'?'up':($information->color=='danger'?'down':'right')}}" class="w-4 h-4 ml-0.5"></i>
                      </div>
                    </div>
                  </div>
                  <div class="text-3xl font-medium leading-8 mt-6">{{$information->text1}}</div>
                  <div class="text-base text-slate-500 mt-1">{{$information->text2}}</div>
                </div>
              </div>
            </div>
            @else
            <div class="col-span-12 col-span-{{$information->width}} lg:col-span-{{$information->width_lg}} intro-y">
              <div class="report-box zoom-in">
                <div class="box p-5">
                 <div class="text-3xl font-medium leading-8">{{$information->text1}} {{$information->text2}}</div>
                </div>
              </div>
            </div>
            @endif
            @endforeach
          </div>
        </div>
        <!-- END: General Report -->
      </div>
    </div>
  </div>
</div>

@endsection