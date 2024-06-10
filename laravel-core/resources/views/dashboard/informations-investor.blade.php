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
            <h2 class="text-lg font-medium truncate mr-5"> {{$investor->name}} view </h2>
            <a class="btn btn-primary shadow-md mr-2 ml-auto flex items-center" href="{{route('informations.create')}}?investor={{$investor->id}}">Create New Information</a>
          </div>
          <!--
          <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
              <div class="report-box zoom-in">
                <div class="box p-5">
                  <div class="flex">
                    New information
                  </div>
                  <form method="POST" action="{{route('informations.create')}}">
                  @csrf
                    <input type="hidden" name="investor_id" value="{{$investor->id}}">
                    <div class="text-base text-slate-500  mt-6">
                      <select name="informationIcon" >
                          <option >activity</option>
                          <option >airplay</option>
                      </select>
                    </div>
                    <div class="text-base text-slate-500 mt-1"><input name="informationChange" type="text" placeholder="33%"></div>
                    <div class="text-base text-slate-500 mt-1">
                      <select name="informationColor">
                          <option value="success">Green</option>
                          <option value="danger">Red</option>
                          <option value="warning">Orange</option>
                      </select>
                    </div>
                    <div class="text-base text-slate-500 mt-1"><input type="text" name="informationText1" placeholder="4.710"></div>
                    <div class="text-base text-slate-500 mt-1"><input type="text" name="informationText2" placeholder="Item Sales"></div>
                    <input type="submit" class="btn btn-success text-white mt-2" value="Create">
                  </form>
                </div>
              </div>
            </div>
          </div>-->
          <div class="grid grid-cols-12 gap-6 mt-5">
            @foreach($informations as $information)
            <div class="col-span-12 col-span-{{$information->width}} lg:col-span-{{$information->width_lg}} intro-y">
              <div class="report-box zoom-in">
                <div class="box p-5">
                  <form method="post" action="{{route('informations.delete', $information->id)}}" class="mb-2">
                  @csrf
                  @method('delete')
                  <button class="btn btn-danger">X</button>
                  </form>

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
            @endforeach
          </div>
        </div>
        <!-- END: General Report -->
      </div>
    </div>
  </div>
</div>
@endsection