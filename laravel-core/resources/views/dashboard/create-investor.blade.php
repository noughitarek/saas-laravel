@extends('layouts.dashboard')
@section('title', "Create investor")
@section('content')
<form action="{{route('investors.create')}}" method="post">
@csrf
  <div class="content content--top-nav">
    <h2 class="intro-y text-lg font-medium mt-10"> Create investor </h2>
    <div class="intro-y col-span-12 lg:col-span-6">
      <div class="intro-y box p-5">
        <div>
          <label class="form-label">Name</label>
          <input type="text" name="investorName" class="form-control w-full" placeholder="ex: Tarek">
        </div>
      </div>
      <div class="intro-y box p-5">
        <div>
          <label class="form-label">Email</label>
          <input type="email" name="investorEmail" class="form-control w-full" placeholder="ex: noughitarek@gmail.com">
        </div>
      </div>
      <div class="intro-y box p-5 mb-2">
        <div>
          <label class="form-label">Password</label>
          <input type="password" name="investorPassword" class="form-control w-full" placeholder="ex: ********">
        </div>
      </div>
      <button class="btn btn-success text-white">Save</button>
    </div>
  </div>
</form>
@endsection