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
    southern ice cap.
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
      $nextfeature->setName("dragonhomemountains");
      $html = <<<HTML
	<h4>Dragonhome Mountains</h4>
  <p>
		The Mountains that separate the wet coastal region of eastern Riftlan from the dry grasslands of the veldt beyond, the Dragonhome Mountains are named for the large population of dragons
    that call it home.  The highest peaks contain great airies where the ancient dragons keep their nests and raise their young.  Devotees from Dera'Dragorim come to the many temples to Bahamut
    and Tiamat located in these mountains to make offerings and provide services.  The first generations of many dragonborn families have come from these meetings.
	</p>
HTML;
      $nextfeature->setHtml($html);
      $manager->persist($nextfeature);
      $manager->flush();
    }
  }
  
?>