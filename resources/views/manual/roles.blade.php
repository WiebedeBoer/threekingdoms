@extends('layouts.manual')
@section('title')
Three Kingdoms - Manual
@endsection
@section('content')
<!--sub menu manual-->
@include('manual.manualmenu')
<h1 class="mai">Roles</h1>

<h2><a name="rulers" class="anch">Rulers</a></h2>
<p>A ruler assigns ranks to his or her subordinates and hence a ruler may also pick provincial governors. The ruler also acts as governor for the capital city of his or her faction. The sole goal of a ruler is to expand the territory of his or her faction. Only a ruler may choose to declare war or sign a peace treaty.</p>

<img src="events/event_orders.jpg" class="event" alt="event">

<h2><a name="governors" class="anch">Governors</a></h2>
<p>A governor acts as a semi-ruler of a province. A province must contain at least one settlement. A governor decides what buildings to build in the settlement(s) he or she has under his or her supervision. A governor also collects taxes and pays salaries to the officers under his or her direct supervision. The sole goal of a governor is to administer a part of the territory of a faction and to serve the interests of his or her ruler.</p>

<img src="events/event_appoint.jpg" class="event" alt="event">

<h2><a name="officers" class="anch">Officers</a></h2>
<p>An officer is a regular faction member who may vote, and who receives a salary, but otherwise has no real power, except over his or her army if he or she happens to be a general. The sole goal of an officer is to serve his superiors, whether that be the ruler or the governor he or she was assigned to. An officer primary plays a supportive role. He or she may be ordered to develop a settlement, or ordered into combat.</p>

<img src="events/event_draft.jpg" class="event" alt="event">

<h2><a name="free" class="anch">Free Officers</a></h2>
<p>A free officer is a character who is not yet member of any faction. He or she is free to roam the game world.</p>

<img src="events/event_search.jpg" class="event" alt="event">
<!--sub menu manual-->
@include('manual.manualmenu')
@endsection