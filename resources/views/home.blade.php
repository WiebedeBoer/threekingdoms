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

		<!--game menu-->
		<div class="game-menu">
					<div class="links">
						<a href="/forum">Forum</a>
						<a href="/manual">Manual</a>
						<a href="/factions">Factions</a>
						<a href="/persons">Officers</a>
						<a href="/towns">Worldmap</a>
						<a href="/chronicles">Chronicles</a>
						<a href="/users/{{ Auth::user()->id }}">Account</a>
					</div>			
		</div>	

@endsection
