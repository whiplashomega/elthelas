<?php
  namespace AppBundle\DataFixtures\ORM;
  
  use Doctrine\Common\DataFixtures\FixtureInterface;
  use Doctrine\Common\Persistence\ObjectManager;
  use AppBundle\Entity\Feature;
  
  class LoadFeatureData implements FixtureInterface {
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
      $nextfeature = new Feature();
      $nextfeature->setName("blackshardpass");
      $html = <<<HTML
        <h4>Black Shard Pass</h4>
        <p>
          When Dorman I finished conquering the human kingdoms in the north, he wanted to move south into the orc
          kingdoms. In order to provide an additional route of attack for his armies, he set his best engineers and
          mages to building a new pass through the mountains. They chose a likely spot, and literally set about
          destroying a mountain to create a low pass. They succeeded (as did Dorman's advance), but they discovered that
          the heart of the mountain had been made of almost pure onyx.
        </p>
HTML;
      $nextfeature->setHtml($html);
      $manager->persist($nextfeature);
      $nextfeature = new Feature();
      $nextfeature->setName("blightedgap");
      $html = <<<HTML
        	<h4>Blighted Gap</h4>
  <p>
		The Blighted Gap is an arid waste, once part of the fertile plain that makes up the bulk of Demal Thor, Curinor, and Southern Gerasalim, nothing grows in the
		area any longer after centuries of warfare on that ground with destructive magic used liberally on both sides. It is bordered on the west by Demal Thor, on the
		north by Curinor, to the east by Gerasalim and to the south by Malinval. The gap is also home to many strange monsters that feed off of the latent magical
		energy that has built up there over time, often drawn to the sites of old battlefields between groups of mages. The north edge of the gap is dotted with
		fortresses, by far the largest of which is the massive Fortress of Light.
	</p>  
HTML;
      $nextfeature->setHtml($html);
      $manager->persist($nextfeature);
      $nextfeature = new Feature();
      $nextfeature->setName("demonpeaks");
      $html = <<<HTML
	<h4>Demon Peaks</h4>
  <p>
		The Demon Peaks are a string of mountains in far west Riftlan, running north from the Sorcerer's Prison along the western edge of the veldt. So named because
		they are the refuge of the demons who survived the wrath of Bahamut after the fall of Dera. The Demons there are generally disorganized, spending much of their
		time hunting the creatures of the veldt for food and sport, yet there are rumors that a great Demon Lord remains high in the mountains, in a fortress of his
		own construction.
	</p> 
HTML;
      $nextfeature->setHtml($html);
      $manager->persist($nextfeature);
      $nextfeature = new Feature();
      $nextfeature->setName("desertdespair");
      $html = <<<HTML
	<h4>Desert of Despair</h4>
  <p>
		Located just south and east of the Glass Cliff in Malinval, the Desert of Despair is a hot desolate place that despite its relative proximity to the coast,
		rain somehow never falls and the wind never blows. It is sandy and barren, yet unlike the typical sandy desert, there are no dunes, but it is unnaturally flat
		throughout. Once, as a dare, a group of orcs thought to see if they could dig deep enough in the sand to find something other than sand. They dug down close to
		500 feet before their hole collapsed on top of them.
	</p> 
HTML;
      $nextfeature->setHtml($html);
      $manager->persist($nextfeature);
      $nextfeature = new Feature();
      $nextfeature->setName("fireislands");
      $html = <<<HTML
	<h4>Fire Islands</h4>
  <p>
		The Fire Islands are a large group of small volcanic islands off of the coast of Stagenheim. The regular volcanic activity means very few people choose to live
		there, and those that do are generally devotees of Molton. The islands are rich in gemstones, and export them throughout the world.
	</p>
HTML;
      $nextfeature->setHtml($html);
      $manager->persist($nextfeature);
      $nextfeature = new Feature();
      $nextfeature->setName("glasscliff");
      $html = <<<HTML
	<h4>Glass Cliff</h4>
  <p>
		The Glass Cliff is a 1000 ft smooth vertical plane that sits on the southern border of Eldoran on the Elathian continent and runs for nearly 300 miles across, a
		remnant of the God's War, most historians and theologists believe it to be the work of Molton, the God of Fire. Nevertheless, it serves as an effective border
		between Eldoran and Malinval, and ensures relative safety from direct invasion for both sides. Attempts to take samples by the elves have proven that it is not
		in fact glass, but a smooth, dense diamond lattice not even adamantine can puncture, and that appears to absorb magical energy.
	</p>
HTML;
      $nextfeature->setHtml($html);
      $manager->persist($nextfeature);
      $nextfeature = new Feature();
      $nextfeature->setName("goldenpass");
      $html = <<<HTML
	<h4>Golden Pass</h4>
  <p>
		The Golden Pass lies between Demal Thor and Malinval, and has been a common invasion route for the orcs. On the Demal Thor side the ancient fortress city of
		Aridhem, the only permanent settlement of the Moon Elves, guards the pass. The pass itself is named as it is because of the way it shines in the sun, however
		prospectors who have braved the journey come back with little worth risking a mining venture in such a dangerous territory.
	</p>
HTML;
      $nextfeature->setHtml($html);
      $manager->persist($nextfeature);
      $nextfeature = new Feature();
      $nextfeature->setName("icewastes");
      $html = <<<HTML
	<h4>Ice Wastes</h4>
	<p>
	  The Ice Wastes are a flat frozen tundra on the southern edge of Atyrea, south of the Gorgro plateau and Staelia. It has never been fully explored, but it is believed to terminate at the
	  southern ice cap.  The ice wastes are full of strange and unusual creatures and monsters found nowhere else in the
	  world.  It is also the home of the white dragons.
	</p>
HTML;
      $nextfeature->setHtml($html);
      $manager->persist($nextfeature);
      $nextfeature = new Feature();
      $nextfeature->setName("mithrilhills");
      $html = <<<HTML
	<h4>Mithril Hills</h4>
  <p>
		The Mithril Hills is a hilly trailless area along the border of Eldoran and Curinor rich in mithril and other valuable minerals. The two countries have disputed over ownership of the
    hills for centuries, and the wars typically only stopped when one side or both became involved in some other conflict. The end to the wars happened recently when the elves attacked the
    dwarven holds in the area while the armies were away elsewhere, slaughtering non-combatants and leaving them depopulated and empty. The dwarves fought the elves to a stalemate after that,
    but since the resulting peace treaty, the dwarves had had no active reason to declare war since.
	</p>
HTML;
      $nextfeature->setHtml($html);
      $manager->persist($nextfeature);
      $nextfeature = new Feature();
      $nextfeature->setName("moonpass");
      $html = <<<HTML
	<h4>Moon Pass</h4>
  <p>
		Moon Pass for many centuries was internal to Eldoran, simply a way across the mountains that seperated the lands of wood elf from moon elf. When Demal Thor declared independence, that
    changed quickly. Instead it became a major strategic strongpoint, and the site of several major battles. The successful defense of the pass by the moon elves meant that the high elves
    had to either attack north of the mountains, where their supply caravans were regularly raided by dwarf irregulars, or to the south, where the bulk of the moon elf army held them at
    bay.
	</p>
HTML;
      $nextfeature->setHtml($html);
      $manager->persist($nextfeature);
      $nextfeature = new Feature();
      $nextfeature->setName("nadrakriver");
      $html = <<<HTML
	<h4>Nadrak River</h4>
  <p>
		The River Nadrak runs out of the black shard pass, through the hills surrounding Malgeth and meeting trade off the Little Nadrak coming from Parakas. Eventually it runs through
    Morda'serek'hai before hitting the coast through the ruins of Peloria. The Nadrak and its tributaries are the primary vehicle for trade in eastern Malinval.
	</p>
HTML;
      $nextfeature->setHtml($html);
      $manager->persist($nextfeature);
      $nextfeature = new Feature();
      $nextfeature->setName("rustdesert");
      $html = <<<HTML
	<h4>Rust Desert</h4>
  <p>
		The Rust Desert is dry yes, but not actually dry enough to be classified a desert in most circumstances. Rather nothing grows there because the entire several thousand square mile area is
    a massive pit filled with tiny rusted iron filings. Believed to contain more than 90% of the world's accessible iron, its origin is unknown, although it is considered a major strategic
    resource, and has changed hands multiple times between the orcs and the Dormanian Empire.
	</p>
HTML;
      $nextfeature->setHtml($html);
      $manager->persist($nextfeature);
      $nextfeature = new Feature();
      $nextfeature->setName("sarialake");
      $html = <<<HTML
	<h4>Saria Lake</h4>
  <p>
		A large lake at the conflux of several major rivers in central Gerasalim. Saria Lake is the only lake on the Elathian continent where you cannot see the far side from the shore. Saria
    Lake is a major fishery and trade ships put in at a variety of villages and towns along the shore, most notably Strovenguard, capital of Gerasalim.
	</p>
HTML;
      $nextfeature->setHtml($html);
      $manager->persist($nextfeature);
      $nextfeature = new Feature();
      $nextfeature->setName("serpentsspine");
      $html = <<<HTML
	<h4>Serpent's Spine</h4>
  <p>
		The Serpent's Spine is a lengthy underwater ridge that rises to within about 50 feet of sea level along its length, and is covered in coral reef above that tall enough to break the
    surface in most places. The spine goes for hundreds of miles north and south, separating the isles of the Morrindim from the Atyrean continent. It is impassable by ship except through
    magical means, which means most traders and ship captains simply go around.
	</p>
HTML;
      $nextfeature->setHtml($html);
      $manager->persist($nextfeature);
      $nextfeature = new Feature();
      $nextfeature->setName("titanspeaks");
      $html = <<<HTML
	<h4>Titan's Peaks</h4>
  <p>
		The only act of major divine intervention to occur since the Gods' Agreement, the Titan's Peaks are actually a broad ring of mostly impassable mountains that circle what was once the
    subcontinent of Nerim. After the Nerim Cataclysm the Gods agreed that the undead needed to be stopped, and worked together to create the barrier.
	</p>
HTML;
      $nextfeature->setHtml($html);
      $manager->persist($nextfeature);
      $nextfeature = new Feature();
      $nextfeature->setName("trollpass");
      $html = <<<HTML
	<h4>Troll Pass</h4>
  <p>
		The Troll Pass is less a pass, and more a wide ramp that flows down from the high plateau of Gorgro , cutting through the surrounding mountains. It is the primary route by which trolls,
    ogres, giants, and other monstrous creatures of the plateau leave to raid the surrounding lands, particularly Staelia .
	</p>
HTML;
      $nextfeature->setHtml($html);
      $manager->persist($nextfeature);
      $nextfeature = new Feature();
      $nextfeature->setName("undeadwoods");
      $html = <<<HTML
	<h4>Undead Woods</h4>
  <p>
		The first major conflict of the Mithril Wars saw the dwarves attempt to invade Eldoran in force. They landed a large army on the northeast shore of Eldoran, and started a campaign of
    destruction through the forests there, forcing the residents to flee or be killed. The elves were taken by surprise, expecting the dwarves to attack elsewhere. When they finally were able
    to field a significant enough army to take on the dwarves assault, the battle was long and bloody, and neither side gave up an inch until only a bare fragment of either army remained, and
    the fighting had continued for 6 days. Finally, the dwarves retreated, leaving behind their dead and making for the shore, where the Morrind ships that had taken them there waited. As
    time passed rumors began to spread that the woods where that final battle had taken place, and all the area that the dwarves had laid waste to were haunted, and those who tried to
    resettle that land were never heard from again. Today they are called the Undead Woods, and they are forbidden ground.
	</p>
HTML;
      $nextfeature->setHtml($html);
      $manager->persist($nextfeature);
      $nextfeature = new Feature();
      $nextfeature->setName("veldt");
      $html = <<<HTML
	<h4>Veldt</h4>
  <p>
		The Veldt is a large savannah that occupies the bulk of the western continent north of Zelfir and west of the mountains that marked the ancient border of Dera . The veldt is known for
    having weak planar boundaries, and monsters of many kinds have made their home their over the years. It is considered highly dangerous, and there are no known humanoid inhabitants.
	</p>
HTML;
      $nextfeature->setHtml($html);
      $manager->persist($nextfeature);
      $nextfeature = new Feature();
      $nextfeature->setName("worldcrack");
      $html = <<<HTML
	<h4>World Crack</h4>
  <p>
		The World Crack is a massive canyon that separates the bulk of Dormania from Gerasalim, Malinval, and Arad. The Crack is roughly a mile and a half deep at its deepest, about 600 miles
    long, and about 80 miles wide at its widest point. Most of the canyon is filled with water at the bottom. The crack is a remnant of the God's War, and whatever cataclysmic event caused it
    is lost to history. The city of Malidal is built on a magically-supported platform at the water level on the Dormanian side of the crack at a low point in the wall. A long ramp leads down
    the approximately 3000 feet to get to its level over a length of about 15 miles. Two major rivers drain into the canyon, one at the northern terminus, and the other near Malidal, both
    river mouths are a sight to behold as the water cascades several thousand feet down in a great waterfall.
	</p>
HTML;
      $nextfeature->setHtml($html);
      $manager->persist($nextfeature);
      $nextfeature = new Feature();
      $nextfeature->setName("smugglerspass");
      $html = <<<HTML
	<h4>Smuggler's Pass</h4>
  <p>
		The Smuggler's Pass is named such because it is a well known route for smugglers who trap various creatures, extraplanar or just dangerous, on the central steppes of the Veldt on the
    journey to the coast where they can be shipped and sold on the black market or otherwise throughout the world. In ancient days it was a major throughway of Dera, but today little remains
    of the once broad roads. The city of Portsmith was actually founded at least in part to help combat the smugglers.
	</p>
HTML;
      $nextfeature->setHtml($html);
      $manager->persist($nextfeature);
      $nextfeature = new Feature();
      $nextfeature->setName("miragelake");
      $html = <<<HTML
	<h4>Mirage Lake</h4>
  <p>
		Located in the center of the Veldt, Mirage Lake is rumored to sit on top of a portal to the Elemental Plane of Water.  Whatever the source, it is the home of a wide variety of unusual and
    magical creatures, many of an elemental variety.  The water of mirage lake is said to be extraordinarily pure, free of salts and other contaminants.
	</p>
HTML;
      $nextfeature->setHtml($html);
      $manager->persist($nextfeature);
      $nextfeature = new Feature();
      $nextfeature->setName("ruuriver");
      $html = <<<HTML
	<h4>Ruu River</h4>
  <p>
    The Ruu river runs near the eastern border of Hisru'de'tan, along the entire length of the country, with various tributaries pushing deep into hisru
    territory.  The river provides much needed water for the Hisru's herds, and so access to it is a source of constant contention among the tribes.
  </p>
HTML;
      $nextfeature->setHtml($html);
      $manager->persist($nextfeature);
      $nextfeature = new Feature();
      $nextfeature->setName("alfriver");
      $html = <<<HTML
	<h4>Alf River</h4>
  <p>
    One of two rivers for which Alfadir is named, the Alf is the more northern of the two.  It is a well developed river that provides irrigation to large
    swathes of countryside.  The rights to the water of the Alf are tightly controlled by the Alfadiran government, or more accurately, by the large
    farmer barons who use the government to provide themselves large water subsidies and charge everyone else for access.
	</p>
HTML;
      $nextfeature->setHtml($html);
      $manager->persist($nextfeature);
      $nextfeature = new Feature();
      $nextfeature->setName("dirriver");
      $html = <<<HTML
	<h4>Dir River</h4>
  <p>
    One of two rivers for which Alfadir is named, the Dir is the more southern of the two.  It is a well developed river that provides irrigation to large
    swathes of countryside.  The rights to the water of the Dir are tightly controlled by the Alfadiran government, or more accurately, by the large
    farmer barons who use the government to provide themselves large water subsidies and charge everyone else for access.
	</p>
HTML;
      $nextfeature->setHtml($html);
      $manager->persist($nextfeature);
      $nextfeature = new Feature();
      $nextfeature->setName("staelicriver");
      $html = <<<HTML
	<h4>Staelic River</h4>
  <p>
    Running through the western woods of Staelia, the Staelic river serves as an important break point in their defense against the trolls and giants
    who come down from the Gorgro plateau.  The river has fortified embankments all along the eastern shore, with fortresses hovering over irrigation
    channels that run further east.
	</p>
HTML;
      $nextfeature->setHtml($html);
      $manager->persist($nextfeature);
      $nextfeature = new Feature();
      $nextfeature->setName("redriver");
      $html = <<<HTML
	<h4>Red River</h4>
  <p>
    Zelfir produces the best steel outside of Parakas, and the reason shows up in their famous red river.  The river gets its color from the iron ore
    that lines its bed and washes down from the mines in the hills.  The ore is not special, but the quantity of untapped reserves means iron is cheap,
    and so smelters have more leeway to experiment with alloys without wasting expensive raw materials.  While they have not been able to mimic the
    famous red steel produced from the iron of the rust desert, the smelters of the red river valley are truly skilled artisans.
  </p>
  <p>
    Outside of the steel industry, the red river also provides the bulk of water supplies for Zelfin and much of the countryside of Zelfir.
  </p>
HTML;
      $nextfeature->setHtml($html);
      $manager->persist($nextfeature);
      $nextfeature = new Feature();
      $nextfeature->setName("boundaryriver");
      $html = <<<HTML
	<h4>Boundary River</h4>
  <p>
    The Boundary River runs on a northeast - southwest course through Riftlan, some 80-100 miles north west of Last Watch and the official patrolled border
    of Zelfir.  It is generally considered to mark the final boundary between civilization and the areas inhabited by man, and the wild, untamed central
    Veldt.  Only the trading post and fortress Saldan is known to lie further north anywhere west of the Dragonhome Mountains.  Between the river and the
    fort lies 150 miles of grassland without a single human inhabitant outside of the occasional hermit.
  </p>
HTML;
      $nextfeature->setHtml($html);
      $manager->persist($nextfeature);
      $nextfeature = new Feature();
      $nextfeature->setName("mashashanariver");
      $html = <<<HTML
	<h4>Mashashana River</h4>
  <p>
    The Mashashana River, the second longest in the world and by far the largest by volume, draws water from two massive mountain ranges, and pulls in
    additional flow from the Elemental Plane of Water at Mirage Lake.  Running north through the great expanse of the Veldt, it's headwaters lie
    in the dragonhome mountains above Saldan, while it's mouth flows into a massive delta system on the northwestern shores of Riftlan.
  </p>
HTML;
      $nextfeature->setHtml($html);
      $manager->persist($nextfeature);
      $nextfeature = new Feature();
      $nextfeature->setName("sindiokra");
      $html = <<<HTML
	<h4>Sindi Okra</h4>
  <p>
    Sindi Okra, when considered together with the Ara River (which really is the same river on the other side of Saria Lake), is the longest river system
    in the world.  The Sindi Okra branch, literally translated from Elvish to mean Orc Waters, runs from Saria Lake south through the blighted gap, past
    Makir, Marinval, and Gulutheim to finally flow into the south sea some 2000 miles south of the headwaters of the Ara.  Despite crossing through a
    major war zone, the river acts as a primary conduit for trade across large swaths of the continent, although by the time it reaches Gulutheim the
    water is so poluted as to be completely undrinkable.
  </p>
HTML;
      $nextfeature->setHtml($html);
      $manager->persist($nextfeature);
      $nextfeature = new Feature();
      $nextfeature->setName("sindisilmeranna");
      $html = <<<HTML
	<h4>Sindi Silme-Ranna</h4>
  <p>
    Flowing westward from it's headwaters above Aridhem to its final termination at Estapor, The River of the Moon Elves was the migration route for
    the eastward flowing settlers from Eldoran who settled Demal Thor.  The river's route points in the direction of the largest moon of Elthelas, Ara,
    giving the moon elves their original name, 'those who follow the moon'.  Today it provides an avenue for trade for the two elven nations, and an
    important connection to the sea for Demal Thor.
  </p>
HTML;
      $nextfeature->setHtml($html);
      $manager->persist($nextfeature);
      $nextfeature = new Feature();
      $nextfeature->setName("sindidalelda");
      $html = <<<HTML
	<h4>Sindi Dal'Elda</h4>
  <p>
    The 'River of Elf Home' was the site of the first elven settlements after the Gods War, most notably, at its mouth sits the great city of Loridesa,
    capitol of Eldoran, and seat of the largest kingdom by land area in the world.
	</p>
HTML;
      $nextfeature->setHtml($html);
      $manager->persist($nextfeature);
      $nextfeature = new Feature();
      $nextfeature->setName("sindiohta");
      $html = <<<HTML
	<h4>Sindi Ohta</h4>
  <p>
    Literally translated 'War River', Sindi Ohta was for many years the semi-official boundary between Eldoran and Curinor, with the dwarves controlling
    the Mithril Hills beyond.  As the elves continued to gain power and the dwarves military might slowly receded, the border pushed further and further to
    the north and east, beyond the river, until today it sits 50-100 miles beyond, running through the northern part of the mithril hills and terminating
    at the Fortress of Light, with the western part of the border changing from Eldoran to Demal Thor half way between.
	</p>
  <p>
    The land surrounding the river is sparsely populated, with the only settlement of any size being Storvel, a minor elvish city that sits astride the
    trade routes coming west from Gerasalim and Curinor.
  </p>
HTML;
      $nextfeature->setHtml($html);
      $manager->persist($nextfeature);
      $nextfeature = new Feature();
      $nextfeature->setName("rockriver");
      $html = <<<HTML
	<h4>Rock River</h4>
  <p>
    The rock river runs through the heart of curinor, pulling its source waters from the Runic Mountains and the Mithril Hills.  It feeds farms and
    communities of plains dwarves all along its length, who named it 'Rock' so they could claim to live close to the 'Rock', raising their status among
    their peers.  This reinforced the increased wealth and opportunity that access to fresh water provided them, and meshed with the traditional dwarven
    caste system, allowing the surface living plains dwarves to have their own system of status despite being the lowest outcasts among dwarven society
    as a whole.
  </p>
HTML;
      $nextfeature->setHtml($html);
      $manager->persist($nextfeature);
      $nextfeature = new Feature();
      $nextfeature->setName("runicmountains");
      $html = <<<HTML
	<h4>Runic Mountains</h4>
  <p>
    After the Gods War, a group of dwarves led by a young warrior named Curin found themselves living in an unusual natural cave system deep in the
    mountains of central Elathia.  The walls of the caves were covered in a script that none alive could read, but which the dwarves called 'runes'.
    The mountains themselves soon took the name, becoming the 'Runic Mountains', and over time dwarven scholars would learn to decipher the writings,
    and discovered their magical import.
  </p>
  <p>
    Today that original cave system is lost, perhaps destroyed to make room for some dwarven hold or other, but the name remains as a herald that
    'here there be dwarves', and pointing the way to the largest, most imposing natural mountain formation in the world.
  </p>
HTML;
      $nextfeature->setHtml($html);
      $manager->persist($nextfeature);
      $nextfeature = new Feature();
      $nextfeature->setName("blackpeaks");
      $html = <<<HTML
	<h4>Black Peaks</h4>
  <p>
    The imposing mountain range blocking the way between Gerasalim and Malinval gets its name from the black specked granite, onyx, and other volcanic rock
    that make up much of the rock in the area.  It is theorized that the mountains were created during the Gods War by the Gods themselves pulling magma
    and rock up from the heart of the earth to destroy each others armies.  Regardless of how they were created, the mountains today serve as an imposing
    border and stopgap from orcish invasion for Gerasalim.
	</p>
HTML;
      $nextfeature->setHtml($html);
      $manager->persist($nextfeature);
      $nextfeature = new Feature();
      $nextfeature->setName("arururiver");
      $html = <<<HTML
	<h4>Aruru River</h4>
  <p>
    Named for the moon of the same name, the Aruru River is one of three inlets to Lake Saria.  The easternmost and shortest of the three, it carries
    massive amounts of water down from the Black Peaks into Saria Lake, carrying grain and other trade goods from Southeast Gerasalim with it.
	</p>
HTML;
      $nextfeature->setHtml($html);
      $manager->persist($nextfeature);
      $nextfeature = new Feature();
      $nextfeature->setName("arariver");
      $html = <<<HTML
	<h4>Ara River</h4>
  <p>
    The Ara river, like the Sindi Silme-Ranna, runs for much of its length directly under the orbit of the moon Ara.  Feeding into Saria Lake at it's
    southwest termination, it combines with the Sindi Okra to form the longest river system in the world.  It brings a variety of goods down from the heart
    of Gerasalim down to Saria Lake and the capitol at Strovenguard, and forms an important leg in the trade routes with Dormania.
  </p>
HTML;
      $nextfeature->setHtml($html);
      $manager->persist($nextfeature);
      $nextfeature = new Feature();
      $nextfeature->setName("dinariver");
      $html = <<<HTML
	<h4>Dina River</h4>
  <p>
    The Dina River has its head waters in the Runic Mountains, running east and south from there into the northern tip of Saria Lake.  The exact origin of
    the river is unknown outside of the Deep Dwarves, as the head waters run out of massive fortified dwarven fortresses, although it is known that the
    underground river runs as far as Highhammer on the far side of the mountains, allowing the dwarves to send their trade goods east as well as west.
	</p>
HTML;
      $nextfeature->setHtml($html);
      $manager->persist($nextfeature);
      $nextfeature = new Feature();
      $nextfeature->setName("kandorriver");
      $html = <<<HTML
	<h4>Kandor River</h4>
  <p>
    The Kandor River later gave its name to the kingdom it runs through.  The city of Northport sits astride its head waters in the south, and it flows
    northwest to Kaland in the north, crossing the kingdom of Kandor, both east to west and south to north in the process.
	</p>
HTML;
      $nextfeature->setHtml($html);
      $manager->persist($nextfeature);
      $nextfeature = new Feature();
      $nextfeature->setName("yellowriver");
      $html = <<<HTML
	<h4>Yellow River</h4>
  <p>
    A silty, oft-flooding mess of a river, the yellow river is named for the yellow color it gets every time it floods (which it does at least once every
    spring).  These floods provide fertile soil for the eastern farming communities of Dormania.  The river in fact, is two rivers that meet a mere 30
    miles from the coast, named, appropriately, the West Yellow River and the East Yellow River.
	</p>
HTML;
      $nextfeature->setHtml($html);
      $manager->persist($nextfeature);
      $nextfeature = new Feature();
      $nextfeature->setName("dormanriver");
      $html = <<<HTML
	<h4>Dorman River</h4>
  <p>
    Running northeast from the mountains above Desadorel, the imperial capitol of Dormania, to the northeast coast of Elathia, the original name of the
    river was lost years ago.  After Dorman's assencion to godhood was confirmed by imperial priests, the river was renamed in his honor, and all records
    of the original name were altered or expunged.
	</p>
HTML;
      $nextfeature->setHtml($html);
      $manager->persist($nextfeature);
      $manager->flush();
    }
  }
  
?>