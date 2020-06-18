@extends('layouts.game')
@section('title')
Game
@endsection
@section('content')
@include('towns.mapmenu')


	<?xml version="1.0" standalone="no"?><!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
	<svg width="800" height="800" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="map" zoomAndPan="magnify" viewBox="0 0 4000 4000">
	<g z-index="1">
	<image xlink:href="img/china.png" x="0" y="0" width="4000" height="4000">
	</g>



	@foreach($towns as $town) 
		@if($town->items >=5)
			<g z-index="2">
			<a xlink:href="/towns/{{$town->town_id}}"><title>{{$town->town_name}} ({{$town->items}} special items)</title><circle cx="{{$town->xcoord}}" cy="{{$town->ycoord}}" r="17" fill="rgb(255,255,0)" stroke="rgb(255,0,255)" stroke-width="4" /></a>
			</g>
		@elseif($town->items ==4)
			<g z-index="2">
			<a xlink:href="/towns/{{$town->town_id}}"><title>{{$town->town_name}} (4 special items)</title><circle cx="{{$town->xcoord}}" cy="{{$town->ycoord}}" r="16" fill="rgb(255,128,0)" stroke="rgb(255,0,255)" stroke-width="4" /></a>
			</g>
		@elseif($town->items ==3)
			<g z-index="2">
			<a xlink:href="/towns/{{$town->town_id}}"><title>{{$town->town_name}} (3 special items)</title><circle cx="{{$town->xcoord}}" cy="{{$town->ycoord}}" r="15" fill="rgb(255,0,0)" stroke="rgb(255,0,255)" stroke-width="4" /></a>
			</g>
		@elseif($town->items ==2)
			<g z-index="2">
			<a xlink:href="/towns/{{$town->town_id}}"><title>{{$town->town_name}} (2 special items)</title><circle cx="{{$town->xcoord}}" cy="{{$town->ycoord}}" r="14" fill="rgb(160,0,0)" stroke="rgb(255,0,255)" stroke-width="4" /></a>
			</g>
		@elseif($town->items ==1)
			<g z-index="2">
			<a xlink:href="/towns/{{$town->town_id}}"><title>{{$town->town_name}} (1 special item)</title><circle cx="{{$town->xcoord}}" cy="{{$town->ycoord}}" r="13" fill="rgb(92,0,0)" stroke="rgb(255,0,255)" stroke-width="4" /></a>
			</g>
		@else
			<g z-index="2">
			<a xlink:href="/towns/{{$town->town_id}}"><title>{{$town->town_name}}</title><circle cx="{{$town->xcoord}}" cy="{{$town->ycoord}}" r="12" fill="rgb(0,0,0)" stroke="black" stroke-width="4" /></a>
			</g>
		@endif
	@endforeach
	</svg>



@endsection