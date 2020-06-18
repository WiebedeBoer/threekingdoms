@extends('layouts.manual')
@section('title')
Three Kingdoms - Manual
@endsection
@section('content')
<!--sub menu manual-->
@include('manual.manualmenu')

<h1 class="mai">Player Character</h1>
<h2><a name="development" class="anch">Character Development</a></h2>


<h3>Character Development</h3>
<p>Over the course of your character's lifespan, you may improve your character's statistics through personal turns, combat, or faction turns. Some random events can also improve some of your character's statistics.</p>

<img src="events/event_marriage.jpg" class="event" alt="event">

<h3>Death in Combat</h3>
<p>Player characters do not necessarily have to die in combat, they may also be captured, or simply be knocked unconscious or injured. Some injuries and random events can cause a temporary or permanent drop in certain statistics.</p>

<img src="events/event_downfall.jpg" class="event" alt="event">

<h3>Lifespan &amp; Succession</h3>
<p>A game round spans decades and thus may have more game years than the average lifespan of an ordinary character. So your character may not survive the full length of a game round.</p>
<p>In case your character dies, your character will remain in the game as the succesor of your original character. The successor will be the next generation of your character.</p>

<p>Successors do not get to keep the statistics of the previous generation. So a drop in statistics may occur.</p>


<img src="events/event_death.jpg" class="event" alt="event">

<h2><a name="statistics" class="anch">Character Statistics</a></h2>

<p>You can develop 17 different statistics for your character. A statistic ranges from a minimum of 1 point to a maximum of 99 points.</p>
<p>Statistics come into five categories:</p>
<p>Development Statistics are important when you want to develop settlements and the economy, these statistics are important if you want your character to have a supportive role.</p>
<p>Management Statistics are a bit of a mixed bag. Statistics like <i>leadership</i> and <i>tactics</i> are important in battle. In general these statistics tend to be more important for characters in a leading role such as a ruler or governor.</p>
<p>Combat proficiences are used in combat. Any player who wants his or her character to be good in battle should develop these statistics.</p>
<p>Weapon proficiences are used for handling weapons. A player who wants his or her character to be good with a particular weapon should develop these statistics.</p>
<p>Logistical proficiencies are important in battle, but can also be important for adventuring.</p>


<h2><a name="development" class="anch">Development Statistics</a></h2>

<h3>Judgement</h3>
<p>Judgement represents how fair and sound that character is in politics. This statistic affects the ability by which this character can develop justice and happiness.</p>

<h3>Engineer</h3>
<p>This statistic represents how effective a character is at constructing buildings and improvements. Characters with a high engineer statistic are better able to equip troops with weapons.</p>

<h3>Commerce</h3>
<p>This statistic represents how efficient a character can develop industry and trade in a place. Commerce is the primary statistic for developing the economy of a settlement. Characters with a high commerce statistic are more effective at managing industries in a settlement.</p>

<h3>Agriculture</h3>
<p>This statistic increases the ease by which this character can develop agriculture in a place. Agriculture is of great importance to a character who wishes to feed his or her population or develop resources for industry. Characters with a high agriculture statistic are more effective at managing farms in a settlement.</p>


<h2><a name="management" class="anch">Management Statistics</a></h2>

<h3>Tactics</h3>
<p>Tactics is a representation of cunning of a character. Characters with a high tactics statistic are better able to setup ploys.</p>

<h3>Leadership</h3>
<p>Leadership represents how a character performs on the battlefield. This statistic affects the efficiency by which a character performs in combat. Characters with a high leadership statistic are sound tacticians and strategists. Characters with high leadership are better able to organise troops and maintain formation in battle. This statistic affects the ability of a character to draft and train troops and it affects the size of the armies the character leads.</p>

<h3>Charisma</h3>
<p>Charisma represents how pleasant a character is to be around and how skilled a character is at influencing others through speech and actions. This statistic affects the efficiency by which a character maintains morale of the troops under his or her command. It helps to maintain happiness in a settlement.</p>

<h2><a name="combat" class="anch">Combat Proficiencies</a></h2>

<h3>Brawn</h3>
<p>Brawn is a representation of physical power and toughness in general of a character. Characters with a high brawn statistic are better able to withstand assassinations and are better able to withstand damage inflicted in battle and duels. Characters with a high brawn statistic are less prone to injury.</p>

<h3>Strength</h3>
<p>Strength represents the amount of damage a character can cause with a strike in a duel or a battle.</p>

<h3>Agility</h3>
<p>Agility is a respresentation of nimbleness of a character. Characters with high agility are better able to deflect enemy strikes.</p>

<h2><a name="weapon" class="anch">Weapon Proficiencies</a></h2>

<h3>Polearms</h3>
<p>Polearms represents the ability of a character to wield weapons like spears, lances, pikes, battle-axes, maces, and tridents.</p>

<h3>Swordsmanship</h3>
<p>Swordmanship represents the ability of a character to wield weapons like swords, falxes, and daggers.</p>

<h3>Archery</h3>
<p>Archery represents the ability of a character to wield weapons like bows.</p>

<h2><a name="logistical" class="anch">Logistical Proficiencies</a></h2>

<h3>Riding</h3>
<p>The riding statistic represents your character's performance on land. The riding statistic affects how good a character performs as a cavalry officer.</p>

<h3>Sailing</h3>
<p>The sailing statistic represents your character's performance on sea or on rivers. The sailing statistic affects how good a character performs in naval combat.</p>

<h3>Raiding</h3>
<p>Raiding represents how effective a character is at stealing or raiding goods and resources from enemy places. Raiding also represents the ability of a character to wield fire and cause destruction to buildings and settlements. Characters with a high raiding statistic are good at raiding places and aquire more resources and goods. Characters with a high raiding skill are more stealthy and can more easily remain undetected and are more effective at setting up ambushes.</p>

<h3>Tracking</h3>
<p>Tracking represents how effective a character is at finding precious treasures and rare items. The statistic affects the ability of a character to discover sites and the ability of a character to avoid traps and ambushes.</p>



<img src="events/event_raid.jpg" class="event" alt="event">

<h2><a name="development">Character Skills</a></h2>
<p>Skills give a boost to some character statistics.</p>

<h3>Administration</h3>
<p>A character with the administration skill is more adept at improving public order in a settlement.</p>

<h3>Archery</h3>
<p>The archery skill provides a bonus to the archery statistic.</p>

<h3>Architect</h3>
<p>A character with the architect skill is better at constructing settlement buildings.</p>

<h3>Ballistics</h3>
<p>A character with the ballistics skill is more adept at sieges.</p>

<h3>Cartography</h3>
<p>The cartography skill provides a bonus to the tracking statistic.</p>

<h3>Engineer</h3>
<p>The engineer skill provides a bonus to the engineer statistic.</p>

<h3>Farmer</h3>
<p>The farmer skill provides a bonus to the agriculture statistic.</p>

<h3>Heroic</h3>
<p>A character with the heroic skill can launch deveastating special attacks and fights better in duels.</p>

<h3>Literature</h3>
<p>A character with the literature skill has a better ability to improve his or her development and management statistics.</p>

<h3>Machinery</h3>
<p>A character with the machinery skill is more adept at sieges.</p>

<h3>Masonry</h3>
<p>A character with the masonry skill is better at constructing settlement buildings.</p>

<h3>Medicine</h3>
<p>A character with the medicine skill has a greater ability to heal soldiers and other characters.</p>

<h3>Navy</h3>
<p>The navy skill provides a bonus to the sailing statistic.</p>

<h3>Philosophy</h3>
<p>A character with the philosophy skill has a better ability to improve his or her development and management statistics.</p>

<h3>Poetry</h3>
<p>The poetry skill provides a bonus to the charisma statistic.</p>
<!--sub menu manual-->
@include('manual.manualmenu')
@endsection