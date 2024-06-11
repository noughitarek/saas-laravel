@extends('layouts.dashboard')
@section('title', "Faq categories")
@section('content')
<div class="content content--top-nav">
  <div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto"> Update Profile </h2>
  </div>
  <div class="grid grid-cols-12 gap-6">
    <!-- BEGIN: Profile Menu -->
    <div class="col-span-12 lg:col-span-4 2xl:col-span-3 flex lg:block flex-col-reverse">
      <div class="intro-y box mt-5">
        <div class="relative flex items-center p-5">
          <div class="w-12 h-12 image-fit">
            <img alt="{{config('settings.title')}}" class="rounded-full" src="{{asset(config('settings.logo')??'assets/dashboard/images/profile-14.jpg')}}">
          </div>
          <div class="ml-4 mr-auto">
            <div class="font-medium text-base">{{config('settings.title')}}</div>
            <div class="text-slate-500">{{Auth::user()->role}}</div>
          </div>
          <div class="dropdown">
            <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false" data-tw-toggle="dropdown">
              <i data-lucide="more-horizontal" class="w-5 h-5 text-slate-500"></i>
            </a>
            <div class="dropdown-menu w-56">
              <ul class="dropdown-content">
                <li>
                  <h6 class="dropdown-header"> Export Options </h6>
                </li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li>
                  <a href="" class="dropdown-item">
                    <i data-lucide="activity" class="w-4 h-4 mr-2"></i> English </a>
                </li>
                <li>
                  <a href="" class="dropdown-item">
                    <i data-lucide="box" class="w-4 h-4 mr-2"></i> Indonesia <div class="text-xs text-white px-1 rounded-full bg-danger ml-auto">10</div>
                  </a>
                </li>
                <li>
                  <a href="" class="dropdown-item">
                    <i data-lucide="layout" class="w-4 h-4 mr-2"></i> English </a>
                </li>
                <li>
                  <a href="" class="dropdown-item">
                    <i data-lucide="sidebar" class="w-4 h-4 mr-2"></i> Indonesia </a>
                </li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li>
                  <div class="flex p-1">
                    <button type="button" class="btn btn-primary py-1 px-2">Settings</button>
                    <button type="button" class="btn btn-secondary py-1 px-2 ml-auto">View Profile</button>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="p-5 border-t border-slate-200/60 dark:border-darkmode-400">
          <a class="flex items-center" href="{{route('settings')}}">
            <i data-lucide="activity" class="w-4 h-4 mr-2"></i> General settings </a>
          <a class="flex items-center mt-5 text-primary font-medium" href="{{route('settings.help.categories')}}">
            <i data-lucide="activity" class="w-4 h-4 mr-2"></i> Help management </a>
        </div>
      </div>
    </div>
    <!-- END: Profile Menu -->
    <div class="col-span-12 lg:col-span-8 2xl:col-span-9">
      <!-- BEGIN: Display Information -->
      <div class="intro-y box lg:mt-5">
        <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
          <h2 class="font-medium text-base mr-auto"> Help categories </h2>
          <a href="{{route('settings.help.create_category')}}" class="btn btn-secondary mr-2">Create category</a>
          <a href="{{route('settings.help.create_faq')}}" class="btn btn-primary mr-2">Create faq</a>
        </div>
        <div class="p-5">
          <div class="flex flex-col-reverse xl:flex-row flex-col">
            @foreach($categories as $category)
              <div class="intro-y col-span-{{$category->width}} lg:col-span-{{$category->width_lg}}">
                  <div class="box">
                      <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                          <h2 class="font-medium text-base mr-auto">
                              {{$category->title}}
                            <a href="{{route('settings.help.edit_category', $category->id)}}" class="text-warning"><i data-lucide="pencil" class="w-4 h-4 mr-1"></i></a>
                            <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#delete-category-{{$category->id}}" class="text-danger"><i data-lucide="trash-2" class="w-4 h-4 mr-1"></i></a>
                          </h2>
                      </div>
                      <div id="faq-accordion-{{$category->id}}" class="accordion p-5">
                          @foreach($category->FAQ_admins() as $faq)
                          <div class="accordion-item">
                              <div id="faq-accordion-content-{{$faq->id}}" class="accordion-header">
                                  <button class="accordion-button" type="button" data-tw-toggle="collapse" data-tw-target="#faq-accordion-collapse-{{$faq->id}}" aria-expanded="true" aria-controls="faq-accordion-collapse-{{$faq->id}}"> {{$faq->title}} (adm)</button>
                              </div>
                              <div id="faq-accordion-collapse-{{$faq->id}}" class="accordion-collapse collapse" aria-labelledby="faq-accordion-content-{{$faq->id}}" data-tw-parent="#faq-accordion-{{$category->id}}">
                                  <div class="accordion-body text-slate-600 dark:text-slate-500 leading-relaxed"> {{$faq->content}} </div>
                              </div>
                            <a href="{{route('settings.help.edit_faq', $faq->id)}}" class="text-warning"><i data-lucide="pencil" class="w-4 h-4 mr-1"></i></a>
                            <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#delete-faq-{{$faq->id}}" class="text-danger"><i data-lucide="trash-2" class="w-4 h-4 mr-1"></i></a>
                          </div>
                          
                          @endforeach
                          @foreach($category->FAQ_investors() as $faq)
                          <div class="accordion-item">
                              <div id="faq-accordion-content-{{$faq->id}}" class="accordion-header">
                                  <button class="accordion-button" type="button" data-tw-toggle="collapse" data-tw-target="#faq-accordion-collapse-{{$faq->id}}" aria-expanded="true" aria-controls="faq-accordion-collapse-{{$faq->id}}"> {{$faq->title}} (inv)</button>
                              </div>
                              <div id="faq-accordion-collapse-{{$faq->id}}" class="accordion-collapse collapse" aria-labelledby="faq-accordion-content-{{$faq->id}}" data-tw-parent="#faq-accordion-{{$category->id}}">
                                  <div class="accordion-body text-slate-600 dark:text-slate-500 leading-relaxed"> {{$faq->content}} </div>
                              </div>
                              <a href="{{route('settings.help.edit_faq', $faq->id)}}" class="text-warning"><i data-lucide="pencil" class="w-4 h-4 mr-1"></i></a>
                              <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#delete-faq-{{$faq->id}}" class="text-danger"><i data-lucide="trash-2" class="w-4 h-4 mr-1"></i></a>
                          </div>
                          @endforeach
                      </div>
                  </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@foreach($categories as $category)
<div id="delete-category-{{$category->id}}" class="modal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body p-0">
        <div class="p-5 text-center">
          <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
          <div class="text-3xl mt-5">Are you sure?</div>
          <div class="text-slate-500 mt-2">Do you really want to delete these records? <br>This process cannot be undone. </div>
        </div>
        <div class="px-5 pb-8 text-center">
          <form action="{{route('settings.help.delete_category', $category->id)}}" method="post">
            @csrf
            @method('delete')
            <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
            <button class="btn btn-danger w-24">Delete</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@foreach($category->FAQ_admins() as $faq)
<div id="delete-faq-{{$faq->id}}" class="modal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body p-0">
        <div class="p-5 text-center">
          <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
          <div class="text-3xl mt-5">Are you sure?</div>
          <div class="text-slate-500 mt-2">Do you really want to delete these records? <br>This process cannot be undone. </div>
        </div>
        <div class="px-5 pb-8 text-center">
          <form action="{{route('settings.help.delete_faq', $faq->id)}}" method="post">
            @csrf
            @method('delete')
            <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
            <button class="btn btn-danger w-24">Delete</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endforeach
@foreach($category->FAQ_investors() as $faq)
<div id="delete-faq-{{$faq->id}}" class="modal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body p-0">
        <div class="p-5 text-center">
          <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
          <div class="text-3xl mt-5">Are you sure?</div>
          <div class="text-slate-500 mt-2">Do you really want to delete these records? <br>This process cannot be undone. </div>
        </div>
        <div class="px-5 pb-8 text-center">
          <form action="{{route('settings.help.delete_faq', $faq->id)}}" method="post">
            @csrf
            @method('delete')
            <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
            <button class="btn btn-danger w-24">Delete</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endforeach
@endforeach
@endsection