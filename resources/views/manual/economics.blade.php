@extends('layouts.manual')
@section('title')
Three Kingdoms - Manual
@endsection
@section('content')
<!--sub menu manual-->
@include('manual.manualmenu')
<H1 class="mai">Economy</H1>

<H2><a name="economy" class="anch">Economy</a></H2>

<h3>Economic Development</h3>
<p>Settlements can be developed by spending turns on commands. Every character gets 1 faction turn per year and 1 personal tun per year.</p>
<p>Personal turns of a character can only be used by the player who owns the character. Faction turns can only be used by a ruler or governor.</p>
<p>Turns can be saved up to 8 seasons.</p>
<p>A settlement can be developed on 4 particular areas. These numbers decay with time and hence have to continually be developed.</p>

<table class="table">
<thead>
<tr><th>Economic Area</th><th>Command</th><th>Statistics</th><th>Range</th></tr>
</thead>
<tbody>
<tr><td class="des">defenses</td><td class="we">fortify</td><td class="des">engineer &amp; judgement</td><td class="uri">1 - 999</td></tr>
<tr><td class="des">justice</td><td class="we">hold court</td><td class="des">judgement &amp; charisma</td><td class="uri">1 - 999</td></tr>
<tr><td class="des">commerce</td><td class="we">develop industry</td><td class="des">engineer &amp; commerce</td><td class="uri">1 - 999</td></tr>
<tr><td class="des">agriculture</td><td class="we">develop agriculture</td><td class="des">engineer &amp; agriculture</td><td class="uri">1 - 999</td></tr>
</tbody>
</table>

<p><B>Defenses</B><BR>Defenses represents the walls and fortifications of a settlement. Defenses help the defender in a siege. Defenses can be increased with the <i>fortify</i> command. The efficiency of the <i>fortify</i> command depends on the engineer and judgement statistics of a character.</P>
<p><B>Justice</B><BR>Justice represents the rule of law in a settlement. Settlements with low justice have more crime, are more prone to rebellions and lose a greater portion of their taxes to corruption. Having a character <i>hold court</i> helps to increase justice in a settlement. The efficiency of the <i>hold court</i> command depends on the judgement statistic of a character. Rebellions may occur if justice gets too low. The kind of rebels that emerge during a rebellion is determined by the area in which the settlement is located.</P>
<p><B>Commerce</B><BR>Commerce represents the general economy of a settlement and how much resources are manufactured. A settlement with high commerce yields more taxes. With the <i>develop commerce</i> command you can increase commerce. The efficiency of the <i>develop commerce</i> command depends on the engineer and commerce statistics of a character.</P>
<p><B>Agriculture</B><BR>Agriculture represents the rural economy of a settlement and how much food is being produced. A settlement with high agriculture yields more taxes and more provisions. With the <i>develop agriculture</i> command you can increase agriculture. The efficiency of the <i>develop agriculture</i> command depends on the engineer and agriculture statistics of a character.</P>

<h3>Fortifications</h3>

<p>The fortifications of a settlement are upgraded, when the defense of a settlement reaches a particular amount of points. Such an upgrade makes it that much harder for a besieger to decrease the defense points of the fortifications of a settlement.</p>

<table class="table">
<thead>
<tr><th>Fortification</th><th>Minimum Defense</th></tr>
</thead>
<tbody>
<tr><td class="des">earthen wall</td><td class="uri">50</td></tr>
<tr><td class="des">stone wall</td><td class="uri">200</td></tr>
<tr><td class="des">large wall</td><td class="uri">700</td></tr>
</tbody>
</table>

<H2><a name="recruitment" class="anch">Recruitment</a></H2>
<p>Army units can be recruited in settlements.</p>

<h3>Draft</h3>
<p>Draft increases the number of soldiers present in a settlement. The leadership statistic increases the efficiency of the draft command. These drafted soldiers will be townwatch in the event of a siege.</p>
<p>These soldiers can be trained and their morale increased. Morale can be increased with the rally command. The efficiency of the rally command is determined by the <i>charisma</i> and <i>leadership</i> statistics of a character. The training of the soldiers can be increased with the train command. The efficiency of the train command is determined by the <i>leadership</i> statistic.</p>
<p>The drafted soldiers present in a settlement can be levied into an army. A levy decreases the number of soldiers present in a settlement and transfers those soldiers to an army unit.</p>

<H2><a name="taxation" class="anch">Taxation</a></H2>
<p>Taxes are collected every game year in autumn. Taxes are collected upon the farm income and commerce income. Corruption negatively affects total tax income. Corruption is lowered by the justice and happiness statistics.</p>

<H2><a name="settlements" class="anch">Settlements</a></H2>

<h3>Population</h3>
<p>The population size of a settlement determines what kind of settlement it is. Larger settlements get more economic bonuses than smaller settlements, but larger settlements also have more waste than smaller settlements.</p>
<p></p>

<table class="table">
<thead>
<tr><th>Settlement Size</th><th>Population</th></tr>
</thead>
<tbody>
<tr><td class="des">small</td><td class="uri">30000</td></tr>
<tr><td class="des">medium</td><td class="uri">60000</td></tr>
<tr><td class="des">remarkable</td><td class="uri">90000</td></tr>
<tr><td class="des">large</td><td class="uri">120000</td></tr>
<tr><td class="des">huge</td><td class="uri">150000</td></tr>
<tr><td class="des">enormous</td><td class="uri">180000</td></tr>
<tr><td class="des">legendary</td><td class="uri">240000</td></tr>
</tbody>
</table>

<H2><a name="demographics" class="anch">Demographics</a></H2>
<p></p>
<h3>Death Rate</h3>
<p>The Death Rate is increased when there is insufficient food or water and lots of waste. </p>
<h3>Birth Rate</h3>
<p>The Birth Rate is primarily determined by the population size of a settlement.</p>
<h3>Migration Rate</h3>
<p>The Migration Rate is determined by the population size of a settlement, and the commerce and agriculture rates.</p>

<H2><a name="construction" class="anch">Construction</a></H2>
<p>A governor or ruler may have an officer construct buildings in a settlement. Buildings allow for the recruitment of units, the production of items and provide for economic bonuses. Construction of buildings take one season to complete.</p>

<table class="table">
<thead>
<tr><th>Building</th><th>Effect</th></tr>
</thead>
<tbody>
<tr><td class="we">Barracks</td><td class="des">increases recruitment of infantry</td></tr>
<tr><td class="we">Granary</td><td class="des">decreases waste of food</td></tr>
<tr><td class="we">Hospital</td><td class="des">increases healing</td></tr>
<tr><td class="we">Prison</td><td class="des">aides in the holding of captives</td></tr>
<tr><td class="we">Smith</td><td class="des">increases manufacture of weapons</td></tr>
<tr><td class="we">Stable</td><td class="des">increases recruitment of cavalry</td></tr>
<tr><td class="we">Workshop</td><td class="des">increases manufacture of trade items</td></tr>
</tbody>
</table>

<H2><a name="agriculture" class="anch">Agriculture</a></H2>
<p>Agriculture represents the food production yield of a settlement. A high agriculture statistic provides greater food output of farms.</p>

<img src="events/event_plenty.jpg" class="event">

<h3>Farms</h3>
<p>An officer can build farms on plots of lands near a settlement.</p>

<p>Farms provide with crops and provisions. There are 7 kinds of crops:</p>

<table class="table">
<thead>
<tr><th>Crop</th><th>Category</th></tr>
</thead>
<tbody>
<tr><td class="we">wheat</td><td class="des">staple food</td></tr>
<tr><td class="we">rice</td><td class="des">staple food</td></tr>
<tr><td class="we">soy</td><td class="des">staple food</td></tr>
<tr><td class="we">plum</td><td class="des">fruit</td></tr>
<tr><td class="we">peach</td><td class="des">fruit</td></tr>
<tr><td class="we">tea</td><td class="des">medicinal</td></tr>
<tr><td class="we">silk</td><td class="des">cash crop</td></tr>
</tbody>
</table>

<p>Staple food and fruit are army and settlement provisions. Cash crops are sold on the market for extra money and used in the industry of the settlement. Medicinals can be used to aide healing.</p>


<H2><a name="commerce" class="anch">Commerce</a></H2>
<p>Commerce represents the amount of trade and industry in a settlement.</p>
<h3>Markets</h3>
<p>Some markets have workshops that produce special trade items. These trade items provide bonuses to statistics.</p>

<table class="table">
<thead>
<tr><th>Item</th><th>Bonus</th></tr>
</thead>
<tbody>
<tr><td class="we">jade burial suit</td><td class="des">+2 judgement</td></tr>
<tr><td class="we">hill censer</td><td class="des">+2 engineer</td></tr>
<tr><td class="we">silk fabrics</td><td class="des">+2 leadership</td></tr>
<tr><td class="we">hunping jar</td><td class="des">+2 agriculture</td></tr>
<tr><td class="we">lacquerware</td><td class="des">+2 commerce</td></tr>
<tr><td class="we">hanging scroll painting</td><td class="des">+2 charisma</td></tr>
</tbody>
</table>


<h2><a name="special" class="anch">Special Items</a></h2>
<p>There a few special items that can be found in some cities. These special items provide bonuses to statistics.</p>
<table class="table">
<thead>
<tr><th>Special Item</th><th>Category</th><th>Statistic Bonus</th></tr>
</thead>
<tbody>
<tr><td class="des">Red Hare</td><td class="we">warhorse</td><td class="des">+2 riding</td></tr>
<tr><td class="des">Hex Mark</td><td class="we">warhorse</td><td class="des">+2 riding</td></tr>
<tr><td class="des">Gray Lightning</td><td class="we">warhorse</td><td class="des">+2 riding</td></tr>
<tr><td class="des">Shadow Runner</td><td class="we">warhorse</td><td class="des">+2 riding</td></tr>
<tr><td class="des">White Dragon</td><td class="we">warhorse</td><td class="des">+2 riding</td></tr>
<tr><td class="des">Black Dragon</td><td class="we">warhorse</td><td class="des">+2 riding</td></tr>
<tr><td class="des">Sword of Heaven</td><td class="we">weapon</td><td class="des">+10 swordmanship</td></tr>
<tr><td class="des">Crescent Halberd</td><td class="we">weapon</td><td class="des">+7 polearms</td></tr>
<tr><td class="des">Swords of Fate</td><td class="we">weapon</td><td class="des">+7 swordmanship</td></tr>
<tr><td class="des">Viper Blade</td><td class="we">weapon</td><td class="des">+7 polearms</td></tr>
<tr><td class="des">Seven Star Sword</td><td class="we">weapon</td><td class="des">+5 swordmanship</td></tr>
<tr><td class="des">Ancestral Sword</td><td class="we">weapon</td><td class="des">+2 swordmanship</td></tr>
<tr><td class="des">War Trident</td><td class="we">weapon</td><td class="des">+2 polearms</td></tr>
<tr><td class="des">Great Axe</td><td class="we">weapon</td><td class="des">+2 polearms</td></tr>
<tr><td class="des">Steel Flail</td><td class="we">weapon</td><td class="des">+2 polearms</td></tr>
<tr><td class="des">Throwing Blade</td><td class="we">weapon</td><td class="des">+2 agility</td></tr>
<tr><td class="des">Art of War</td><td class="we">book</td><td class="des">+3 tactics</td></tr>
<tr><td class="des">Scrolls of Taigong</td><td class="we">book</td><td class="des">+3 tactics</td></tr>
<tr><td class="des">Tao Te Ching</td><td class="we">book</td><td class="des">+5 leadership</td></tr>
<tr><td class="des">Classic of Poetry</td><td class="we">book</td><td class="des">+10 judgement</td></tr>
<tr><td class="des">Book of Documents</td><td class="we">book</td><td class="des">+10 judgement</td></tr>
<tr><td class="des">Book of Rites</td><td class="we">book</td><td class="des">+10 judgement</td></tr>
<tr><td class="des">Spring and Autumn Annals</td><td class="we">book</td><td class="des">+10 judgement</td></tr>
<tr><td class="des">Imperial Seal</td><td class="we">regalia</td><td class="des">+10 charisma</td></tr>
</tbody>
</table>
<!--sub menu manual-->
@include('manual.manualmenu')
@endsection