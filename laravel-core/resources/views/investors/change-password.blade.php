@extends('layouts.investors')
@section('title', "Profile")
@section('content')
<form action="{{route('investors.profile.update')}}" method="POST" enctype="multipart/form-data">
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
              <img alt="{{Auth::guard('investor')->user()->name}}" class="rounded-full" src="{{asset(Auth::guard('investor')->user()->picture??'assets/dashboard/images/profile-14.jpg')}}">
            </div>
            <div class="ml-4 mr-auto">
              <div class="font-medium text-base">{{Auth::guard('investor')->user()->name}}</div>
              <div class="text-slate-500">{{Auth::guard('investor')->user()->role}}</div>
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
            <a class="flex items-center " href="{{route('investors.profile.edit')}}">
              <i data-lucide="activity" class="w-4 h-4 mr-2"></i> Personal Information </a>
            <a class="flex items-center text-primary font-medium mt-5" href="{{route('investors.password.edit')}}">
              <i data-lucide="lock" class="w-4 h-4 mr-2"></i> Change Password </a>
            <a class="flex items-center mt-5" href="{{route('investors.style.edit')}}">
              <i data-lucide="pencil" class="w-4 h-4 mr-2"></i> Styling </a>
          </div>
        </div>
      </div>
      <!-- END: Profile Menu -->
      <form method="POST" action="{{route('investors.password.update')}}">
        @csrf
        <div class="col-span-12 lg:col-span-8 2xl:col-span-9">
          <div class="intro-y box lg:mt-5">
            <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                <h2 class="font-medium text-base mr-auto">
                    Change Password
                </h2>
            </div>
            <div class="p-5">
                <div>
                    <label for="change-password-form-1" class="form-label">Old Password</label>
                    <input id="change-password-form-1" name="current_password" type="password" class="form-control" placeholder="current-password">
                </div>
                <div class="mt-3">
                    <label for="change-password-form-2" class="form-label">New Password</label>
                    <input id="change-password-form-2" name="password" type="password" class="form-control" placeholder="new-password">
                </div>
                <div class="mt-3">
                    <label for="change-password-form-3" class="form-label">Confirm New Password</label>
                    <input id="change-password-form-3" name="password_confirmation" type="password" class="form-control" placeholder="new-password">
                </div>
                <button type="button" class="btn btn-primary mt-4">Change Password</button>
            </div>
          </div>
        </div>
      </form>
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

    removePicture.addEventListener('click', function(){
      pictureView.src = '{{asset("assets/dashboard/images/profile-14.jpg")}}'
      picture.value = undefined
    })

    picture.addEventListener('change', function(){
      pictureView.src = picture
    })
  });
</script>
@endsection