<?php
  namespace AppBundle\DataFixtures\ORM;
  
  use Doctrine\Common\DataFixtures\FixtureInterface;
  use Doctrine\Common\Persistence\ObjectManager;
  use AppBundle\Entity\City;
  
  class LoadCityData implements FixtureInterface {
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
      $nextcity = new City();
      $nextcity->setName("curinkeep");
      $html = <<<HTML
  <h4>Curin Keep</h4>
	<p>
		Population: 160,000 (Metro Area: 210,000)
	</p>
	<p>
		National Allegience: Curinor
	</p>
	<p>Majority Racial Group: Hill Dwarves</p>
	<p>Ruling Group: Deep Dwarves</p>
	<p>
		Curin Keep, the impregnable fortress, is the ancient center of dwarven culture, and the first hold.  Over its history it has grown
		from a small network of mines and caverns into a massive undermountain fortress that goes thousands of feet below the surface and houses
		hundreds of thousands of dwarves.  Tunnels from Curin Keep lead to every major hold in Curinor.
	</p>
	<p>
		It's status as the cultural and political center of Curinor means people from all over the world find their way here to trade, nevertheless,
		no one who is not a dwarf is allowed beyond the upper levels, and even the low-caste Plains Dwarves are not permitted to go to the deepest
		levels where the most sacred temples, halls of government, and of course, richest mines live.   Curinor sits over veins of adamantium and
		gold that are believed to run all the way to the planet's mantle, and every year the dwarves dig a little deeper to pull out the riches
		of the earth.
	</p>
	<h4>Temple of the Song</h4>
	<p>
		The headquarters of the church of Dorun, The sound of the temple singers can be heard throughout the caverns of Curin Keep ringing in complex
		harmonies that overlap each other in intricate ways such that wherever one is the song is different, but always beautiful.
	</p>
	<h4>Halls of the Underking</h4>
	<p>
		The palace of the underking is the center of Curinor's government.  While the public facing side is grand and beautiful, with walls of marble
		and gilt, behind the scenes it houses a massive beauracracy that manages the regulation and government of the kingdom.  The underking himself
		is more a figurhead than anything, acting as the face of the government to foreign powers.
	</p>
	<h4>The Deepest Chamber</h4>
	<p>
		The Deepest Chamber is the home of the Curin Congress, the primary legislative and judicial body of Curinor.  It's name has been a misnomer
		for nearly 1000 years however, as the mines have continued to dig deeper and deeper into the earth, yet when the chamber was first built, it
		was indeed the deepest chamber the dwarves had ever built.
	</p>
	<h4>Alliance Embassy</h4>
	<p>
		The Embassy of the Alliance of 6 Nations actually sits above ground, near one of the primary entrances to the city.  It is a large fortress
		complex where the ambassadors from the other 5 nations have quarters and meeting rooms, as well as take audience with members of their
		constituencies so that they can advocate for their positions.
	</p>
HTML;
      $nextcity->setHtml($html);
      $manager->persist($nextcity);
      $nextcity = new City();
      $nextcity->setName("aridhem");
      $html = <<<HTML
  <h4>Aridhem</h4>
	<p>
		Population: 2,000 (Metro Area: 5,000)
	</p>
	<p>
		National Allegience: Demal'Thor (currently occupied by Malinval)
	</p>
	<p>Majority Racial Group: Moon Elves</p>
	<p>Ruling Group: Moon Elves</p>
	<p>
		Aridhem's permanent population is actually only a few thousand souls, many of whom are merchants, both local and foreign, who deal in
		exporting the herd animals and leather goods that are the leading exports of the region, and selling various imported goods to the
		tribes.  The herdsmen and craftsmen they trade with arrive with their clans at sporadic intervals when they need to buy and sell a large
		number of goods, or when the tribal leaders need to meet to discuss matters of state.
	</p>
	<p>
		Because of this there are very few permanent structures in the city.  The city walls are simple fortifications consisting of low earthen
		mounds topped with spikes, guarding a mostly tent city.  Towards the heart of the city is the Council Building, a rather utilitarian stone
		structure where the meetings between the tribal chiefs are held.  It contains not only meeting spaces, but also rooms and shelter for
		the chiefs and their entourages, as well as foreign dignitaries, such as the alliance ambassadors.  Outside of the Council Building, only
		the occasional house, shop, or warehouse belonging to a merchant break up the field of tents.
	</p>
	<p>
		Currently, the city is almost entirely depopulated, after it was sacked and occupied by an orcish army, then retaken.  Little trade
    occurs in the city now, and those who could have fled.  The city remains under immenent threat from orcish attack.
	</p>
HTML;
      $nextcity->setHtml($html);
      $manager->persist($nextcity);
      $nextcity = new City();
      $nextcity->setName("parakas");
      $html = <<<HTML
  <h4>Parakas</h4>
	<p>
		Population: 315,000 (Metro Area: 330,000)
	</p>
	<p>
		National Allegience: Malinval 
	</p>
	<p>Majority Racial Group: Grunt Orcs</p>
	<p>Ruling Group: High Orcs</p>
	<p>
		Parakas, the City of Steel, is an imposing sight on approach.  The walls are 60 foot tall structures of burnished red steel, and the
		buildings of the city are all made of the same material.  On the west side of the city, facing the rust desert, the walls reach up
		to 200 feet tall, designed to protect the city from the 'rust storms' that blow in from the rust desert.  The protection of the walls is not
		perfect, and the windows of the city are all fitted with steel window shades that can be closed to protect the residents, and no one puts
		a window on the western side of a house.
	</p>
	<p>
		Despite this very real threat, the wealth brought by the rust desert is enough to make this city one of the most prosperous in the world. The
		steel made from the iron of the rust desert is not only the best in the world, but has a distinctive red color that makes it hard to sell
		a counterfeit.  The warlord of Parakas has a unique status among the orc warlords, in that none care to threaten his position, so long as
		he agrees to sell steel to all parties, an arangement that likely has as much to do with the cities formidable defences and near
		impossibility to siege.  The last army to attempt it, in YFC 1808, was shredded by a large rust storm that killed more than a third of the
		besieging army.
	</p>
	<p>
		The city itself is ruled as a communistic society, with the power of the local warlord nearly absolute.
	</p>
HTML;
      $nextcity->setHtml($html);
      $manager->persist($nextcity);
      $nextcity = new City();
      $nextcity->setName("marinda");
      $html = <<<HTML
  <h4>Marinda</h4>
	<p>
		Population: unknown (previously approx. 65,000)
	</p>
	<p>
		National Allegience: Morrindim
	</p>
	<p>Majority Racial Group: Demons (previously Morrind Dwarves)</p>
	<p>Ruling Group: Demons (previously Morrind Dwarves)</p>
	<p>
		Until recently, Marinda was a thriving port city of the Morrind, a stop off point for goods headed further east to destinations
		such as Dormania, Terron, Seran, and Arad.  That all changed when a strange portal openned over the Mage's guild in the center of town.
		Demons swarmed out of the portal, slaughtering everyone they found.  Within an hour a force of devils started swarming from a portal in the
		harbor as well, and the Blood War, the ancient and eternal war between demon and devilkind, had found its way to the mortal plane.  
	</p>
	<p>
		With the harbor destroyed, there was little avenue for escape for the locals, and only a scant few escaped to tell the tale of what happened.
		Details are scarce, but it is known that the demons eventually prevailed, and as of now are only contained on the island by a massive
		blockade by the Morrind navy.
	</p>
HTML;
      $nextcity->setHtml($html);
      $manager->persist($nextcity);
      $nextcity = new City();
      $nextcity->setName("eastguard");
      $html = <<<HTML
  <h4>Eastguard</h4>
	<p>
		Population: 20,000 (metro area: 35,000)
	</p>
	<p>
		National Allegience: Gerasalim
	</p>
	<p>Majority Racial Group: Imperial Humans</p>
	<p>Ruling Group: Imperial Humans</p>
  <p>
    Eastguard is a fortress city established by Dorman III to guard the exit of the black shard pass, as it looked increasingly likely the orcs
    would retake the land beyond.  The city fell briefly during the reign of Dorman IX, but has, in general been a bulwark of imperial defense ever
    since.
  </p>
  <p>
    The fortress city serves as a major supply dump for alliance forces and the Gerasaline army, as well as a trade hub for the southeastern part of
    Gerasalim.
  </p>
HTML;
      $nextcity->setHtml($html);
      $manager->persist($nextcity);
      $nextcity = new City();
      $nextcity->setName("nerim");
      $html = <<<HTML
  <h4>Nerim</h4>
	<p>
		Population: 0 
	</p>
	<p>
		National Allegience: none
	</p>
	<p>Majority Racial Group: Undead</p>
	<p>Ruling Group: Undead</p>
  <p>
    Nerim was once the capital of a thriving empire, and had nearly a million residents.  The Nerim Cataclysm, centered in the Royal Palace of the
    city, left no one alive, but the city entirely intact.  Since then the resulting war, wind, and sand have taken their toll on the city, but its
    buildings, largely made of bone-white granite, and the similarly constructed underworks, are still mostly intact.
  </p>
  <p>
    The city is filled with large numbers of roaming undead, who come into and out of the city fruitlessly hunting for living beings to kill, perpetually
    trapped in a seemingly endless desert, never to die.
  </p>
  <h4>The Royal Palace</h4>
  <p>
    The imposing royal palace sits at the center of the city, seemingly untouched by time, it's spires visible for miles around.  It is an imposing,
    granite structure, with glass domed roofs and spires shooting hundreds of feet into the air.
  </p>
  <h4>The Temple of Nera</h4>
  <p>
    Once the center of religious life for the entire empire, the Temple of Nera is a large walled complex that sits across The Penitents Plaza from the
    Royal Palace.  
  </p>
  <h4>The Underworks</h4>
  <p>
    To support it's massive population, the imperial government built a massive aquaduct and sewer system for the city.  As the population grew, and it
    became difficult to continue feeding and supplying the local population, the government put building restrictions on the land at the edges of the city.
    Migrants responded by building down through the sewer system, creating level upon level of underground towns beneath the city, only loosely governed
    by the imperial administration. The police would occasionally move in, clear out the residents, and leave again, only to have the same residents move
    right back in.
  </p>
HTML;
      $nextcity->setHtml($html);
      $manager->persist($nextcity);
      $nextcity = new City();
      $nextcity->setName("morrind");
      $html = <<<HTML
  <h4>Morrind</h4>
  	<p>
		Population: 100,000 
	</p>
	<p>
		National Allegience: Morrindim
	</p>
	<p>Majority Racial Group: Morrind Dwarves</p>
	<p>Ruling Group: Morrind Dwarves</p>
  <p>
    Morrind is the populous capitol and trade hub of the Morrind dwarves.  The city itself is built as a single massive stone structure,
    an attempt by the early Morrind to mimic the traditional dwarven hold, on an island made of pourous volcanic rock and silt.
  </p>
  <h4>The Council of Captains</h4>
  <p>
    The Council of Captains is the central hub of government for Morrindim, with every captain in the fleet having a vote.  The number of members
    present shifts depending on the season and the importance of issues at hand from a few hundred to several thousand.  The Council hall itself
    seats 10,000.
  </p>
  <h4>The Mages Guild</h4>
  <p>
    If there is one thing that is as predictable as dwarves digging holes, it's mage's building towers, and the Morrind mages are no different.  The
    Mage's Guild of Morrind is the one highly distinguishable structure from the outside of the city, sticking up several hundred feet from the squat
    expanse of the cities stone roof.  It is also one of the only buildings with windows, a very unusual architectural feature for dwarves.
  </p>
  <h4>Trimala's Harbor</h4>
  <p>
    Trimala, God of the sea and storms, is one of the patron Gods of the Morrind.  Trimala's Harbor, meanwhile, is the largest enclosed harbor in the
    world, able to bring nearly two-hundred ships to dock at one time, 15 functioning drydocks, and a massive shipyard complex.  Life in the city
    revolves around the harbor and its adjoining markets and warehouses, and it is estimated that more money changes hands here on a daily basis than in
    all of Kandor.
  </p>
HTML;
      $nextcity->setHtml($html);
      $manager->persist($nextcity);
      $nextcity = new City();
      $nextcity->setName("mordaserekhai");
      $html = <<<HTML
  <h4>Morda'Serek'Hai</h4>
    	<p>
		Population: 50,000 (previously 150,000)
	</p>
	<p>
		National Allegience: Malinval
	</p>
	<p>Majority Racial Group: Grunt Orcs</p>
	<p>Ruling Group: High Orcs</p>
  <p>
    Morda'Serek'Hai was ruled by the Stormclaw family for the past several generations, is a today ruled by a governor appointed by the Prince of Fiends,
    after the Stormclaws refused to bend knee to him.  The Stormclaw family was wiped out, although rumors of survivors have popped up from time to time.
    It was the apparent appearance of a Stormclaw sorcerer named Dench that led to the revolt and eventual retaking of Aridhem by the alliance.
  </p>
  <p>
    Morda'Serek'Hai sits along the Nadrak river, and the area around it is known for growing cash crops such as cotton, as well as for livestock such
    as pigs.  Although most of the population was killed or drafted to make an example to the other orc cities and warlords, the surrounding areas were
    left untouched, leading to a much greater concentration of wealth among the merchants and dealers who remain in the city.
  </p>
  <p>
    Until recently, Morda'Serek'Hai was largely made of poorly constructed wood and sod buildings, but the resent influx of wealth has seen new buildings
    made of metal and stone begin to shoot up in the wealthier areas of the city.
  </p>
HTML;
      $nextcity->setHtml($html);
      $manager->persist($nextcity);

      $manager->flush();
      
    }
  }
  
?>