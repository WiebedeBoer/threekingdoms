@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
<!--user audio-->
@if($user_audio ==1)
	 <audio autoplay><source src="music/m2_intro.mp3" type="audio/mpeg">Your browser does not support the audio element.</audio> 
@endif
		<!--session message-->
@include('session')

		<!--game menu-->
@include('layouts.gamemenu')

@endsection
