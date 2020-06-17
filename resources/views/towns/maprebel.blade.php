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
		@if($town->category_rebel =="Yellow Turbans")
			<g z-index="2">
			<a xlink:href="/towns/{{$town->town_id}}"><title>{{$town->town_name}} (Yellow Turbans)</title><circle cx="{{$town->xcoord}}" cy="{{$town->ycoord}}" r="9" fill="rgb(255,255,0)" stroke="black" stroke-width="3" /></a>
			</g>
		@elseif($town->category_rebel =="Black Mountain Bandits")
			<g z-index="2">
			<a xlink:href="/towns/{{$town->town_id}}"><title>{{$town->town_name}} (Black Mountain Bandits)</title><circle cx="{{$town->xcoord}}" cy="{{$town->ycoord}}" r="9" fill="rgb(64,64,0)" stroke="black" stroke-width="3" /></a>
			</g>
		@elseif($town->category_rebel =="Five Pecks of Rice")
			<g z-index="2">
			<a xlink:href="/towns/{{$town->town_id}}"><title>{{$town->town_name}} (Five Pecks of Rice)</title><circle cx="{{$town->xcoord}}" cy="{{$town->ycoord}}" r="9" fill="rgb(128,255,0)" stroke="black" stroke-width="3" /></a>
			</g>
		@elseif($town->category_rebel =="Xiongnu")
			<g z-index="2">
			<a xlink:href="/towns/{{$town->town_id}}"><title>{{$town->town_name}} (Xiongnu)</title><circle cx="{{$town->xcoord}}" cy="{{$town->ycoord}}" r="9" fill="rgb(128,0,128)" stroke="black" stroke-width="3" /></a>
			</g>
		@elseif($town->category_rebel =="Koguryo")
			<g z-index="2">
			<a xlink:href="/towns/{{$town->town_id}}"><title>{{$town->town_name}} (Koguryo)</title><circle cx="{{$town->xcoord}}" cy="{{$town->ycoord}}" r="9" fill="rgb(128,0,0)" stroke="black" stroke-width="3" /></a>
			</g>
		@elseif($town->category_rebel =="Wuhuan")
			<g z-index="2">
			<a xlink:href="/towns/{{$town->town_id}}"><title>{{$town->town_name}} (Wuhuan)</title><circle cx="{{$town->xcoord}}" cy="{{$town->ycoord}}" r="9" fill="rgb(128,0,64)" stroke="black" stroke-width="3" /></a>
			</g>
		@elseif($town->category_rebel =="Yuezhi")
			<g z-index="2">
			<a xlink:href="/towns/{{$town->town_id}}"><title>{{$town->town_name}} (Yuezhi)</title><circle cx="{{$town->xcoord}}" cy="{{$town->ycoord}}" r="9" fill="rgb(64,0,0)" stroke="black" stroke-width="3" /></a>
			</g>
		@elseif($town->category_rebel =="Qiang")
			<g z-index="2">
			<a xlink:href="/towns/{{$town->town_id}}"><title>{{$town->town_name}} (Qiang)</title><circle cx="{{$town->xcoord}}" cy="{{$town->ycoord}}" r="9" fill="rgb(0,128,0)" stroke="black" stroke-width="3" /></a>
			</g>
		@elseif($town->category_rebel =="Baima")
			<g z-index="2">
			<a xlink:href="/towns/{{$town->town_id}}"><title>{{$town->town_name}} (Baima)</title><circle cx="{{$town->xcoord}}" cy="{{$town->ycoord}}" r="9" fill="rgb(0,64,0)" stroke="black" stroke-width="3" /></a>
			</g>
		@elseif($town->category_rebel =="Nanyue")
			<g z-index="2">
			<a xlink:href="/towns/{{$town->town_id}}"><title>{{$town->town_name}} (Nanyue)</title><circle cx="{{$town->xcoord}}" cy="{{$town->ycoord}}" r="9" fill="rgb(0,0,255)" stroke="black" stroke-width="3" /></a>
			</g>
		@elseif($town->category_rebel =="Minyue")
			<g z-index="2">
			<a xlink:href="/towns/{{$town->town_id}}"><title>{{$town->town_name}} (Minyue)</title><circle cx="{{$town->xcoord}}" cy="{{$town->ycoord}}" r="9" fill="rgb(0,0,128)" stroke="black" stroke-width="3" /></a>
			</g>
		@elseif($town->category_rebel =="Dianyue")
			<g z-index="2">
			<a xlink:href="/towns/{{$town->town_id}}"><title>{{$town->town_name}} (Dianyue)</title><circle cx="{{$town->xcoord}}" cy="{{$town->ycoord}}" r="9" fill="rgb(0,0,64)" stroke="black" stroke-width="3" /></a>
			</g>
		@elseif($town->category_rebel =="Yelang")
			<g z-index="2">
			<a xlink:href="/towns/{{$town->town_id}}"><title>{{$town->town_name}} (Yelang)</title><circle cx="{{$town->xcoord}}" cy="{{$town->ycoord}}" r="9" fill="rgb(0,64,64)" stroke="black" stroke-width="3" /></a>
			</g>
		@else
			<g z-index="2">
			<a xlink:href="/towns/{{$town->town_id}}"><title>{{$town->town_name}}</title><circle cx="{{$town->xcoord}}" cy="{{$town->ycoord}}" r="9" fill="rgb(0,0,0)" stroke="black" stroke-width="3" /></a>
			</g>
		@endif
	@endforeach
	</svg>



@endsection