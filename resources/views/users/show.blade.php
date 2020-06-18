@extends('layouts.game')
@section('title')
Game
@endsection
@section('content')
					<div class="container">
						<h1>{{ $userdata->name }}</h1>
						<div class="py-3"><div class="col-sm-3"><h3>Name:</h3> {{ $userdata->name }}</div></div>
						<div class="py-3"><div class="col-sm-3"><h3>Email:</h3> {{ $userdata->email }}</div></div>

						<div class="py-3">
						
<form method="POST" action="/users/{{$userdata->id}}" enctype="multipart/form-data" class="pb-3">
@method('PATCH')
<div class="col-sm-3">
<div class="form-group">

<h3>Music:</h3> <img src="{{ asset('img/images/trumpet.png') }}" class="tbi" width="48" height="48" alt="audio" title="audio">
<select name="audio" class="selectpicker form-control">
<optgroup label="music">
    <option value="1" {{ $userdata->audio ==1 ? 'selected' : '' }}>on</option>
    <option value="0" {{ $userdata->audio ==0 ? 'selected' : '' }}>off</option>
</select>
</div>
<div>{{$errors->first('audio')}}</div>
<div class="py-1"><input type="submit" value="change music setting" class="btn btn-primary"></div>
</div>
@csrf
</form>					
						</div>

@endsection