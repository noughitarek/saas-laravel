@extends('layouts.dashboard')
@section('title', "Informations")
@section('content')
<form method="POST" action="{{route('informations.create')}}">
@csrf
  <div class="content content--top-nav">
    <h2 class="intro-y text-lg font-medium mt-10"> New information </h2>
    <div class="intro-y col-span-12 lg:col-span-6">
      <div class="intro-y box p-5">
        <div>
          <label class="form-label">Icon</label>
          <select name="informationIcon" id="informationIcon" class="form-control w-full">
            @foreach(config('settings.icons') as $icon)
            <option value="{{$icon}}">{{$icon}}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="intro-y box p-5">
        <div>
          <label class="form-label">Investor</label>
          <select name="investor_id" class="form-control w-full">
            @foreach($investors as $investor)
            <option value="{{$investor->id}}" {{isset($_GET['investor']) && $_GET['investor'] == $investor->id?'selected':''}}>{{$investor->name}}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="intro-y box p-5 mb-2">
        <div>
          <label class="form-label">Change</label>
          <input type="text" name="informationChange" class="form-control w-full" placeholder="ex: 33%">
        </div>
      </div>
      <div class="intro-y box p-5">
        <div>
          <label class="form-label">Investor</label>
          <select name="informationColor" class="form-control w-full">
            <option value="success">Green</option>
            <option value="danger">Red</option>
            <option value="warning">Orange</option>
          </select>
        </div>
      </div>
      <div class="intro-y box p-5 mb-2">
        <div>
          <label class="form-label">Text1</label>
          <input type="text" name="informationText1" class="form-control w-full" placeholder="2353">
        </div>
      </div>
      <div class="intro-y box p-5 mb-2">
        <div>
          <label class="form-label">Text2</label>
          <input type="text" name="informationText2" class="form-control w-full" placeholder="orders">
        </div>
      </div>

      <div class="intro-y box p-5 mb-2">
        <div>
          <label class="form-label">Width</label>
          <input type="number" min="1" max="12" value="12" name="informationWidth" class="form-control w-full">
        </div>
      </div>
      <div class="intro-y box p-5 mb-2">
        <div>
          <label class="form-label">Width for large scale screens</label>
          <input type="number" min="1" max="12" value="6" name="informationWidth_lg" class="form-control w-full">
        </div>
      </div>
      <button class="btn btn-success text-white">Save</button>
    </div>
  </div>
</form>
@endsection