@extends('layouts.game')
@section('title')
Game
@endsection
@section('content')
<!--user audio-->
@if($user_audio ==1)
	 <audio autoplay><source src="music/m1_china.mp3" type="audio/mpeg">Your browser does not support the audio element.</audio> 
@endif

@endsection