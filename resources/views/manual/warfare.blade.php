@extends('layouts.manual')
@section('title')
Three Kingdoms - Manual
@endsection
@section('content')
<!--sub menu manual-->
@include('manual.manualmenu')
<h1 class="mai">Warfare</h1>

<h2><a name="land" class="anch">Land Battles</a></h2>
<p>A field battle is instigated when an army attacks an enemy army.</p>
<img src="events/event_battle.jpg" class="event">
<p>The terrain on which the defending army is situated, determines the battlefield terrain. Generals may use ploys in battle.</p>
<h3>Field Army Strength</h3>
<p>The strength of an army is determined by the number of troops in an army, the category of the unit, and 3 statistics. These statistics are:</p>
<p><b>Training</b>
<br>The training statistic affects discipline, offensive capability, and defensive capability of troops in an army.</p>
<p><b>Morale</b>
<br>An army with very low morale may disintegrate. Troops in a disintegrated army will rout.</p>
<p><b>Equipment</b>
<br>The equipment statistic affects the quality of weapons, armour, and shields of troops in an army.</p>
<h3>Army General</h3>
<p>The combat proficiency statistics of a general may affect the strength of an army.</p>
<p>The primary weapon used by a unit determines which combat proficiency statistic of the general affects the lethality of a unit. For instance a general with a high polearms statistics who leads troops carrying spears, inflicts a higher number of casualties on the enemy army.</p>

<h2><a name="naval" class="anch">Naval Battles</a></h2>
<p>A naval battle is instigated when a fleet attacks an enemy fleet.</p>
<p>Casualties in a naval battle are spread amongst the crew and marines of a ship.</p>

<h2><a name="siege" class="anch">Sieges</a></h2>
<p>The defenders in a siege are the drafted soldiers present in a settlement.</p>
<p>The attackers in a siege are the levied soldiers present in the army that is laying siege to the settlement.</p>
<p>The defender loses a siege, if the number of drafted soldiers in a settlement hits 0, or if the hitpoints of a settlement hits 0.</p>

<img src="events/event_assault.jpg" class="event">

<h2><a name="ploys" class="anch">Battle Ploys</a></h2>

<h3>Melee Infantry Tactics</h3>

<p><b>Ambush</b>
<br>Your forces lie in wait hidden behind bushes, shrubs and trees and take the enemy forces by surprise and thus cause increased casualties to your foe. This ploy can only be used in terrain with dense vegetation.</p>

<p><b>Attack Provisions</b>
<br>Take provisions from your foe. Soldiers with no provisions will begin to rout.</p>

<h3>Missile Infantry Tactics</h3>

<p><b>Fire Arrows</b>
<br>Your archers use fire when they shoot their arrows. This ploy increases the damage to your foe and lowers the morale of the enemy troops.</p>

<p><b>Volley</b>
<br>Foot archers cause increased casualties to a foe.</p>

<h3>Cavalry Tactics</h3>

<p><b>Cavalry Charge</b>
<br>All melee cavalry and chariots cause increased casaulties to a foe. Use of this ploy may result in a duel.</p>

<h3>Battlefield Tactics</h3>

<p><b>Fortify</b>
<br>Your army sets up a fort or fortified camp. The defenses such as ramparts and entrenchments causes increased casualties to the attacker.</p>

<p><b>Incinerate</b>
<br>Set fire to bushes and shrubs and use the flames to attempt to wipe out your enemy. Be careful though as the winds may turn. This ploy is more effective in dense and dry forests.</p>

<p><b>Misinform</b>
<br>Attempt to trick an enemy and try to escape from battle.</p>

<p><b>Parry</b>
<br>Block an incoming attack and thus reduce your casualties.</p>

<p><b>Perturb</b>
<br>Unsettle the enemy and decrease morale of enemy troops.</p>

<p><b>Raid</b>
<br>A raid is small scale attack with the intent to demoralize, confuse and exhaust the enemy. It is also used to capture people, free prisoners and to ransack a location.</p>

<p><b>Rally</b>
<br>Increases the morale of your troops.</p>

<h3>Naval Tactics</h3>

<p><b>Clash</b>
<br>Use the ram of your ship and attempt to sink the enemy vessel.</p>

<p><b>Fire Arrows</b>
<br>Your archers use fire when they shoot their arrows. This ploy increases the damage to your foe and lowers the morale of the enemy troops.</p>

<p><b>Pyre Ship</b>
<br>Cause enormous destruction to enemy fleets with the use of a pyre ship.</p>

<h3>Siege Tactics</h3>

<p><b>Sally</b>
<br>The defender in a siege attacks and harasses vulnerable attackers before retreating behind the walls. The ploy is used to decrease the strength and preparedness of a besieging army, by capturing or destroying their siege engines.</p>

<p><b>Sap Walls</b>
<br>This ploy is useful when laying siege to a settlement. It causes increased damage to fortifications and city walls.</p>

<h2><a name="duel" class="anch">Duels</a></h2>
<p>A duel may commence between two commanders when you use a cavalry charge.</p>

<img src="events/event_duel.jpg" class="event">

<h3>Special Commands</h3>
<p>Characters with the heroic skill can use special commands during a duel. These special commands provide a bonus during a duel.</p>
<!--sub menu manual-->
@include('manual.manualmenu')
@endsection