@extends('layouts.dashboard')
@section('title', "Informations")
@section('content')
<div class="content content--top-nav">
  <div class="grid grid-cols-12 gap-6">
    <div class="col-span-12 2xl:col-span-9">
      <div class="grid grid-cols-12 gap-6">
        <!-- BEGIN: General Report -->
        <div class="col-span-12 mt-8">
          <div class="intro-y flex items-center h-10">
            <h2 class="text-lg font-medium truncate mr-5"> Investor view </h2>
            <a href="" class="ml-auto flex items-center text-primary">
              <i data-lucide="refresh-ccw" class="w-4 h-4 mr-3"></i> Reload Data </a>
          </div>
          <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
              <div class="report-box zoom-in">
                <div class="box p-5">
                  <div class="flex">
                    New information
                  </div>
                  <div class="text-base text-slate-500  mt-6">
                    <select>
                        <option >Actiity</option>
                    </select>
                  </div>
                  <div class="text-base text-slate-500 mt-1"><input type="text" placeholder="33%"></div>
                  <div class="text-base text-slate-500 mt-1">
                    <select>
                        <option >Actiity</option>
                    </select>
                  </div>
                  <div class="text-base text-slate-500 mt-1"><input type="text" placeholder="4.710"></div>
                  <div class="text-base text-slate-500 mt-1"><input type="text" placeholder="Item Sales"></div>
                </div>
              </div>
            </div>
            @foreach($informations as $Information)
            <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
              <div class="report-box zoom-in">
                <div class="box p-5">
                  <div class="flex">
                    <i data-lucide="shopping-cart" class="report-box__icon text-primary"></i>
                    <div class="ml-auto">
                      <div class="report-box__indicator bg-success tooltip cursor-pointer" title="33% Higher than last month"> 33% <i data-lucide="chevron-up" class="w-4 h-4 ml-0.5"></i>
                      </div>
                    </div>
                  </div>
                  <div class="text-3xl font-medium leading-8 mt-6">4.710</div>
                  <div class="text-base text-slate-500 mt-1">Item Sales</div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
        <!-- END: General Report -->
      </div>
    </div>
  </div>
</div>
@endsection