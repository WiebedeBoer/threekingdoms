@extends('layouts.manual')
@section('title')
Three Kingdoms - Manual
@endsection
@section('content')
<!--sub menu manual-->
@include('manual.manualmenu')
<h2><a name="intro" class="anch">Introduction</a></h2>
<p><b>Three Kingdoms, Age of Turmoil</b> is a grand-strategy roleplaying game. You play a character of your own choosing and you are free to develop your character in this world as you see fit. In the game you play a character who may be part of a faction. The goal of all factions is to dominate the known world.</p>
<img src="scenery/daming_palace.jpg" class="intropic" alt="scenery">
<h2><a name="basics" class="anch">Basics</a></h2>
<p>You need to register before you can play this game. The registration process consists of three basic steps.</p>
<p>First you have to choose whether you want to be a warrior or politician, male or female, and the age of your character.</p>
<p>Second you have to pick a username and password with which you login for the game. You also need to choose a name for your character, a skill, an item, and a portrait. The available portraits depend upon on you whether you chose to be a male or female, and warrior or politician.</p>
<p>Third you have to decide in which settlement to place your home.</p>
<p>From then on you can choose to join an existing faction or create a new faction or become an adventurer. The options in this last step depend upon the previous step in the registration process.</p>
<h3>Create a Faction</h3>
<p>If you choose to create faction, then your character becomes the ruler. You will need to fill in data about your character and you will also need to fill in data about your faction.</p>
<h3>Join a Faction</h3>
<p>If you choose to join a faction, then your character becomes an ordinary officer. You will need to fill in data about your character.</p>
<h3>Adventurer</h3>
<p>If you choose to become an adventurer, then your character becomes a free officer. You will need to fill in data about your character.</p>
<H2><a name="start" class="anch">Getting Started</a></H2>
<p>Once you are registered, you can proceed to play the game and develop your character.</p>
<!--sub menu manual-->
@include('manual.manualmenu')
@endsection