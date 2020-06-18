@extends('layouts.manual')
@section('title')
Three Kingdoms - Manual
@endsection
@section('content')
<!--sub menu manual-->
@include('manual.manualmenu')
<h1 class="mai">Military Units</h1>

<h2><a name="statistics" class="anch">Unit Statistics</a></h2>

<table class="table">
<thead>
<tr><th>&nbsp;</th><th>Unit</th><th>Category</th><th>Weapon</th><th>Armour</th><th>Shield</th><th>Helmet</th><th>Speed</th></tr>
</thead>
<tbody>
<tr><th colspan="8" class="hi">Infantry</th></tr>
<tr><td class="ico"><img src="units/han/militia_han_pike.gif" class="ui"></td><td class="des">Pike Militia</td><td class="des">Melee Infantry</td><td class="we">pike</td><td class="uri">5</td><td class="emp">&nbsp;</td><td class="emp">&nbsp;</td><td class="sp">1</td></tr>
<tr><td class="ico"><img src="units/han/militia_han_sword.gif" class="ui"></td><td class="des">Sword Militia</td><td class="des">Melee Infantry</td><td class="we">sword</td><td class="uri">5</td><td class="uri">2</td><td class="uri">1</td><td class="sp">1</td></tr>
<tr><td class="ico"><img src="units/han/militia_han_bow.gif" class="ui"></td><td class="des">Archer Militia</td><td class="des">Missile Infantry</td><td class="we">bow</td><td class="uri">5</td><td class="emp">&nbsp;</td><td class="uri">1</td><td class="sp">1</td></tr>
<tr><td class="ico"><img src="units/han/infantry_han_pike.gif" class="ui"></td><td class="des">Pike Infantry</td><td class="des">Melee Infantry</td><td class="we">pike</td><td class="uri">7</td><td class="emp">&nbsp;</td><td class="uri">1</td><td class="sp">1</td></tr>
<tr><td class="ico"><img src="units/han/infantry_han_sword.gif" class="ui"></td><td class="des">Sword Infantry</td><td class="des">Melee Infantry</td><td class="we">sword</td><td class="uri">7</td><td class="uri">2</td><td class="uri">1</td><td class="sp">1</td></tr>
<tr><td class="ico"><img src="units/han/infantry_han_bow.gif" class="ui"></td><td class="des">Archer Infantry</td><td class="des">Missile Infantry</td><td class="we">bow</td><td class="uri">7</td><td class="emp">&nbsp;</td><td class="uri">1</td><td class="sp">1</td></tr>
<tr><th colspan="8" class="hi">Standard Bearers</th></tr>
<tr><td class="ico"><img src="units/han/infantry_banner_han.gif" class="ui"></td><td class="des">Standard Bearer</td><td class="des">Melee Infantry</td><td class="we">pike</td><td class="uri">7</td><td class="emp">&nbsp;</td><td class="uri">2</td><td class="sp">1</td></tr>
<tr><th colspan="8" class="hi">Cavalry</th></tr>
<tr><td class="ico"><img src="units/han/cavalry_pike_light.gif" class="ui"></td><td class="des">Spear Cavalry (light)</td><td class="des">Melee Cavalry</td><td class="we">pike</td><td class="uri">6</td><td class="emp">&nbsp;</td><td class="emp">&nbsp;</td><td class="sp">3</td></tr>
<tr><td class="ico"><img src="units/han/cavalry_pike_medium.gif" class="ui"></td><td class="des">Spear Cavalry (medium)</td><td class="des">Melee Cavalry</td><td class="we">pike</td><td class="uri">7</td><td class="emp">&nbsp;</td><td class="emp">&nbsp;</td><td class="sp">3</td></tr>
<tr><td class="ico"><img src="units/han/cavalry_pike_heavy.gif" class="ui"></td><td class="des">Spear Cavalry (heavy)</td><td class="des">Melee Cavalry</td><td class="we">pike</td><td class="uri">7</td><td class="emp">&nbsp;</td><td class="uri">2</td><td class="sp">3</td></tr>
<tr><td class="ico"><img src="units/han/cavalry_bow_light.gif" class="ui"></td><td class="des">Cavalry Archer (light)</td><td class="des">Missile Cavalry</td><td class="we">bow</td><td class="uri">5</td><td class="emp">&nbsp;</td><td class="emp">&nbsp;</td><td class="sp">3</td></tr>
<tr><td class="ico"><img src="units/han/cavalry_bow_medium.gif" class="ui"></td><td class="des">Cavalry Archer (medium)</td><td class="des">Missile Cavalry</td><td class="we">bow</td><td class="uri">5</td><td class="emp">&nbsp;</td><td class="uri">1</td><td class="sp">3</td></tr>
<tr><td class="ico"><img src="units/han/chariot_bow.gif" class="ui"></td><td class="des">Chariot Archer</td><td class="des">Melee Cavalry</td><td class="we">bow</td><td class="uri">7</td><td class="emp">&nbsp;</td><td class="emp">&nbsp;</td><td class="sp">2</td></tr>
<tr><td class="ico"><img src="units/han/chariot_medium.gif" class="ui"></td><td class="des">Chariot (medium)</td><td class="des">Melee Cavalry</td><td class="we">pike</td><td class="uri">7</td><td class="emp">&nbsp;</td><td class="uri">2</td><td class="sp">2</td></tr>
<tr><td class="ico"><img src="units/han/chariot_heavy.gif" class="ui"></td><td class="des">Chariot (heavy)</td><td class="des">Melee Cavalry</td><td class="we">pike</td><td class="uri">7</td><td class="emp">&nbsp;</td><td class="uri">2</td><td class="sp">2</td></tr>
<tr><th colspan="8" class="hi">Cavalry Commanders</th></tr>
<tr><td class="ico"><img src="units/han/commander_pike_han.gif" class="ui"></td><td class="des">Commander Spear</td><td class="des">Melee Cavalry</td><td class="we">pike</td><td class="uri">7</td><td class="emp">&nbsp;</td><td class="uri">2</td><td class="sp">3</td></tr>
<tr><td class="ico"><img src="units/han/commander_sword_han.gif" class="ui"></td><td class="des">Commander Sword</td><td class="des">Melee Cavalry</td><td class="we">sword</td><td class="uri">8</td><td class="emp">&nbsp;</td><td class="uri">1</td><td class="sp">3</td></tr>
<tr><td class="ico"><img src="units/han/commander_sword_han.gif" class="ui"></td><td class="des">Commander Hammer</td><td class="des">Melee Cavalry</td><td class="we">war hammer</td><td class="uri">8</td><td class="emp">&nbsp;</td><td class="uri">1</td><td class="sp">3</td></tr>
<tr><td class="ico"><img src="units/han/chariot_ruler_han.gif" class="ui"></td><td class="des">Chariot Commander</td><td class="des">Melee Cavalry</td><td class="we">war fan</td><td class="uri">8</td><td class="emp">&nbsp;</td><td class="uri">3</td><td class="sp">2</td></tr>
<tr><td class="ico"><img src="units/han/chariot_ruler_han.gif" class="ui"></td><td class="des">Chariot Commander</td><td class="des">Missile Cavalry</td><td class="we">bow</td><td class="uri">8</td><td class="emp">&nbsp;</td><td class="uri">3</td><td class="sp">2</td></tr>
</tbody>
</table>

<h3>Commanders &amp; Standard Bearers</h3>

<p>The appearance of standard bearers and cavalry commanders varies according to the faction.</p>

<h3>Weapon Statistics</h3>

<table class="table">
<thead>
<tr><th>Weapon</th><th>Swing</th><th>Trust</th><th>Missile</th><th>Throwing</th></tr>
</thead>
<tbody>
<tr><td class="des">Sword</td><td class="uri">9</td><td class="uri">8</td><td class="emp">&nbsp;</td><td class="emp">&nbsp;</td></tr>
<tr><td class="des">Pike</td><td class="uri">7</td><td class="uri">9</td><td class="emp">&nbsp;</td><td class="emp">&nbsp;</td></tr>
<tr><td class="des">Bow</td><td class="emp">&nbsp;</td><td class="emp">&nbsp;</td><td class="uri">6</td><td class="emp">&nbsp;</td></tr>
<tr><td class="des">War Fan</td><td class="uri">6</td><td class="uri">5</td><td class="emp">&nbsp;</td><td class="uri">5</td></tr>
<tr><td class="des">War Hammer</td><td class="uri">10</td><td class="uri">5</td><td class="emp">&nbsp;</td><td class="emp">&nbsp;</td></tr>
</tbody>
</table>

<h3>Weapons</h3>

<p>A commander unit category is determined by the main weapon his or her character wields.</p>

<table class="table">
<thead>
<tr><th>&nbsp;</th><th>Weapon</th><th>Category</th><th>Statistic Bonus</th></tr>
</thead>
<tbody>
<tr><td class="ico"><img src="weapons/sabre.gif" class="tui"></td><td class="des">sabre</td><td class="we">sword</td><td class="des">+1 swordsmanship</td></tr>

<tr><td class="ico"><img src="weapons/cleaver.gif" class="tui"></td><td class="des">cleaver</td><td class="we">pike</td><td class="des">+1 polearms</td></tr>
<tr><td class="ico"><img src="weapons/glaive.gif" class="tui"></td><td class="des">glaive</td><td class="we">pike</td><td class="des">+1 polearms</td></tr>
<tr><td class="ico"><img src="weapons/halberd.gif" class="tui"></td><td class="des">halberd</td><td class="we">pike</td><td class="des">+1 polearms</td></tr>
<tr><td class="ico"><img src="weapons/spear.gif" class="tui"></td><td class="des">spear</td><td class="we">pike</td><td class="des">+1 polearms</td></tr>
<tr><td class="ico"><img src="weapons/trident.gif" class="tui"></td><td class="des">trident</td><td class="we">pike</td><td class="des">+1 polearms</td></tr>

<tr><td class="ico"><img src="weapons/bow.gif" class="tui"></td><td class="des">bow</td><td class="we">bow</td><td class="des">+1 archery</td></tr>

<tr><td class="ico"><img src="weapons/charmer.gif" class="tui"></td><td class="des">charmer</td><td class="we">war fan</td><td class="des">+1 charisma</td></tr>
<tr><td class="ico"><img src="weapons/sceptre.gif" class="tui"></td><td class="des">sceptre</td><td class="we">war fan</td><td class="des">+1 leadership</td></tr>
<tr><td class="ico"><img src="weapons/staff.gif" class="tui"></td><td class="des">staff</td><td class="we">war fan</td><td class="des">+1 engineer</td></tr>
<tr><td class="ico"><img src="weapons/war_fan.gif" class="tui"></td><td class="des">war fan</td><td class="we">war fan</td><td class="des">+1 tactics</td></tr>

<tr><td class="ico"><img src="weapons/axe.gif" class="tui"></td><td class="des">axe</td><td class="we">war hammer</td><td class="des">+1 strength</td></tr>
<tr><td class="ico"><img src="weapons/hammer.gif" class="tui"></td><td class="des">hammer</td><td class="we">war hammer</td><td class="des">+1 strength</td></tr>
<tr><td class="ico"><img src="weapons/mace.gif" class="tui"></td><td class="des">mace</td><td class="we">war hammer</td><td class="des">+1 strength</td></tr>
<tbody>
</table>



<h3>Rebels</h3>

<p>Rebel units have a different appearance. Rebels do not have heavy infantry and chariots.</p>

<h2><a name="townwatch" class="anch">Townwatch</a></h2>
<p>The townwatch is the defending army in a siege. It is made up of all the drafted soldiers present in the settlement. </p>
<p>The defense points of the fortifications of a settlement add to the protection of its townwatch.</p>

<h2><a name="navy" class="anch">Navy</a></h2>
<p>Ships can clash or use arrows to kill crew on an enemy ship. Military units become ships in a naval battle. Ships are manned by crew and archers. Missile units get +1 missile in naval battles, while melee units get +1 trust in naval battles.</p>

<!--sub menu manual-->
@include('manual.manualmenu')
@endsection