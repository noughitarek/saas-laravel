@extends('layouts.dashboard')
@section('title', "Settings")
@section('content')
<form action="{{route('profile.update')}}" method="POST" enctype="multipart/form-data">
  @csrf
  @method('patch')
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
            <a class="flex items-center text-primary font-medium" href="{{route('profile.edit')}}">
              <i data-lucide="activity" class="w-4 h-4 mr-2"></i> General settings </a>
          </div>
        </div>
      </div>
      <!-- END: Profile Menu -->
      <div class="col-span-12 lg:col-span-8 2xl:col-span-9">
        <!-- BEGIN: Display Information -->
        <div class="intro-y box lg:mt-5">
          <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
            <h2 class="font-medium text-base mr-auto"> Website Information </h2>
          </div>
          <div class="p-5">
            <div class="flex flex-col-reverse xl:flex-row flex-col">
              <div class="flex-1 mt-6 xl:mt-0">
                <div class="grid grid-cols-12 gap-x-5">
                  <div class="col-span-12 2xl:col-span-6">
                    <div>
                      <label for="update-profile-form-1" class="form-label">Title</label>
                      <input id="update-profile-form-1" name="settings.title" type="text" class="form-control" placeholder="Title" value="{{config('settings.title')}}">
                    </div>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary w-20 mt-3">Save</button>
              </div>
              <div class="w-52 mx-auto xl:mr-0 xl:ml-6">
                <div class="border-2 border-dashed shadow-sm border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                  <div class="h-40 relative image-fit cursor-pointer zoom-in mx-auto">
                    <img id="pictureView" class="rounded-md" alt="{{config('settings.title')}}" src="{{asset(config('settings.logo')??'assets/dashboard/images/profile-14.jpg')}}">
                    <div title="Remove this profile photo?" id="removePicture" class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-danger right-0 top-0 -mr-2 -mt-2">
                      <i data-lucide="x" class="w-4 h-4"></i>
                    </div>
                  </div>
                  <div class="mx-auto cursor-pointer relative mt-5">
                    <button type="button" class="btn btn-primary w-full">Change Photo</button>
                    <input id="picture" name="settings.logo" type="file" class="w-full h-full top-0 left-0 absolute opacity-0">
                    <input type="hidden" id="pictureValue" name="pictureValue">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
@endsection
@section('script')
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const picture = document.getElementById('picture');
    const pictureView = document.getElementById('pictureView');
    const removePicture = document .getElementById('removePicture');
    const pictureValue = document.getElementById('pictureValue');

    removePicture.addEventListener('click', function(){
      pictureView.src = '{{asset("assets/dashboard/images/profile-14.jpg")}}'
      picture.value = ''; 
      pictureValue.value = 'null';
    })

    picture.addEventListener('change', function(){
      const file = picture.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
          pictureView.src = e.target.result;
        }
        reader.readAsDataURL(file);
        pictureValue.value = '';
      }
      else
      {
        pictureValue.value = 'null';
      }
    })
  });
</script>
@endsection