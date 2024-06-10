@extends('layouts.dashboard')
@section('title', "Profile")
@php
function rgbToHex($rgb) {
  $rgbArray = explode(' ', $rgb);
  
  // Convert each component to hexadecimal
  $r = dechex($rgbArray[0]);
  $g = dechex($rgbArray[1]);
  $b = dechex($rgbArray[2]);
  
  // Ensure that each component has two digits
  $r = str_pad($r, 2, '0', STR_PAD_LEFT);
  $g = str_pad($g, 2, '0', STR_PAD_LEFT);
  $b = str_pad($b, 2, '0', STR_PAD_LEFT);
  
  // Concatenate the components to form the hexadecimal color value
  $hexColor = '#' . $r . $g . $b;
  
  return $hexColor;
}

@endphp
@section('content')
<form action="{{route('style.update')}}" method="POST" enctype="multipart/form-data">
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
              <img alt="{{Auth::user()->name}}" class="rounded-full" src="{{asset(Auth::user()->picture??'assets/dashboard/images/profile-14.jpg')}}">
            </div>
            <div class="ml-4 mr-auto">
              <div class="font-medium text-base">{{Auth::user()->name}}</div>
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
            <a class="flex items-center" href="{{route('profile.edit')}}">
              <i data-lucide="activity" class="w-4 h-4 mr-2"></i> Personal Information </a>
            <a class="flex items-center mt-5" href="{{route('password.edit')}}">
              <i data-lucide="lock" class="w-4 h-4 mr-2"></i> Change Password </a>
            <a class="flex items-center mt-5 text-primary font-medium" href="{{route('style.edit')}}">
              <i data-lucide="pencil" class="w-4 h-4 mr-2"></i> Styling </a>
          </div>
        </div>
      </div>
      <div class="col-span-12 lg:col-span-8 2xl:col-span-9">
        <div class="intro-y box lg:mt-5">
          <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
            <h2 class="font-medium text-base mr-auto"> Styling </h2>
          </div>
          <div class="p-5">
            <div class="flex flex-col-reverse xl:flex-row flex-col">
              <div class="flex-1 mt-6 xl:mt-0">
                <div class="grid grid-cols-12 gap-x-5">
                  <div class="col-span-12 2xl:col-span-6">

                  <div class="col-span-12 2xl:col-span-6">
                    <div class="mt-3">
                      <label for="update-profile-form-1" class="form-label">Dark mode</label>
                      <div class="form-check form-switch ml-auto">
                          <input name="dark_mode" class="form-check-input form-control" type="checkbox" {{Auth::user()->dark?'checked':''}}>
                      </div>
                    </div>
                  </div>
                  <div class="col-span-12 2xl:col-span-6">
                    <div class="mt-3">
                      <label for="primary_color" class="form-label">Primary color</label><br>
                      <input id="primary_color" name="primary_color" type="color"  value="{{ rgbToHex(Auth::user()->primary_color) }}">
                    </div>
                  </div>
                  <div class="col-span-12 2xl:col-span-6">
                    <div class="mt-3">
                      <label for="secondary_color" class="form-label">Secondary color</label><br>
                      <input id="secondary_color" name="secondary_color" type="color"  value="{{ rgbToHex(Auth::user()->secondary_color) }}">
                    </div>
                  </div>
                  <div class="col-span-12 2xl:col-span-6">
                    <div class="mt-3">
                      <label for="warning_color" class="form-label">Warning color</label><br>
                      <input id="warning_color" name="warning_color" type="color"  value="{{ rgbToHex(Auth::user()->warning_color) }}">
                    </div>
                  </div>
                  <div class="col-span-12 2xl:col-span-6">
                    <div class="mt-3">
                      <label for="danger_color" class="form-label">Danger color</label><br>
                      <input id="danger_color" name="danger_color" type="color"  value="{{ rgbToHex(Auth::user()->danger_color) }}">
                    </div>
                  </div>
                  <div class="col-span-12 2xl:col-span-6">
                    <div class="mt-3">
                      <label for="danger_color" class="form-label">Danger color</label><br>
                      <input id="danger_color" name="danger_color" type="color"  value="{{ rgbToHex(Auth::user()->danger_color) }}">
                    </div>
                  </div>
                  <div class="col-span-12 2xl:col-span-6">
                    <div class="mt-3">
                      <label for="success_color" class="form-label">Success color</label><br>
                      <input id="success_color" name="success_color" type="color"  value="{{ rgbToHex(Auth::user()->success_color) }}">
                    </div>
                  </div>
                  
                </div>
                <button type="submit" class="btn btn-primary w-20 mt-3">Save</button>
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