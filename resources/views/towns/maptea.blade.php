@extends('layouts.game')
@section('title')
Game
@endsection
@section('content')
<div>
<a href="/towns">default</a>
<a href="/mappopulation">population</a>
<a href="/mapstaples">staples</a>
<a href="/mapplum">plum</a>
<a href="/mappeach">peach</a>
<a href="/maptea">tea</a>
<a href="/mapsilk">silk</a>
<a href="/maprebel">rebels</a>
</div>


	<?xml version="1.0" standalone="no"?><!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
	<svg width="800" height="800" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="map" zoomAndPan="magnify" viewBox="0 0 4000 4000">
	<g z-index="1">
	<image xlink:href="img/china.png" x="0" y="0" width="4000" height="4000">
	</g>



	@foreach($towns as $town) 
		@if($town->tea =="none")
			<g z-index="2">
			<a xlink:href="/towns/{{$town->town_id}}"><title>{{$town->town_name}}</title><circle cx="{{$town->xcoord}}" cy="{{$town->ycoord}}" r="9" fill="rgb(0,0,0)" stroke="black" stroke-width="3" /></a>
			</g>
		@else
			<g z-index="2">
			<a xlink:href="/towns/{{$town->town_id}}"><title>{{$town->town_name}} (tea)</title><circle cx="{{$town->xcoord}}" cy="{{$town->ycoord}}" r="9" fill="rgb(255,255,0)" stroke="black" stroke-width="3" /></a>
			</g>
		@endif
	@endforeach
	</svg>



@endsection