@extends('layouts.game')
@section('title')
Game
@endsection
@section('content')
<!--user audio-->
@if($user_audio ==1)
	 <audio autoplay loop><source src="music/m8_battle.mp3" type="audio/mpeg">Your browser does not support the audio element.</audio> 
@endif

@endsection