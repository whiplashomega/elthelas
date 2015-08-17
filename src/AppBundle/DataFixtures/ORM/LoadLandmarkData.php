<?php
namespace AppBundle\DataFixtures\ORM;
  
  use Doctrine\Common\DataFixtures\FixtureInterface;
  use Doctrine\Common\Persistence\ObjectManager;
  use AppBundle\Entity\Landmark;
  
  class LoadCityData implements FixtureInterface {
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager) {
      $nextlandmark = new Landmark();
      $nextlandmark->setName("curestan");
      $html = <<<HTML
  <h4>Cur'Estan</h4>
  <p>
    Cur'Estan is the fortress headquarters of the Black Wolf Irregulars, a paramilitary mercenary organization that works out of Alliance territory, and has
    a large long-term contract to provide support to Alliance armies.  The fortress of Cur Estan was an old abandoned keep in the woods of Kandor, first built
    during Dorman I war with the dwarves over their eastern holds as a supply dump and staging area for the imperial army.  When the founders of the Black Wolf
    Irregulars discovered it, they bought it from the lumberjacks who owned the land and after making their fortune adventuring, set about restoring the fortress.
  </p>
HTML;
      $nextlandmark->setHtml($html);
      $manager->persist($nextlandmark);
      $nextlandmark = new Landmark();
      $nextlandmark->setName("abyssalgateofdera");
      $html = <<<HTML
  <h4>Abyssal Gate of Dera</h4>
  <p>
    High in the mountains above the ruined city of Dera, the abyssal gate that brought ruin to an empire is buried,
    now closed by Bahamut and guarded constantly by ancient silver dragons, the gate's location is marked by a constant
    smell of brimstone, and a complete lack of growing things.
  </p>
HTML;
      $nextlandmark->setHtml($html);
      $manager->persist($nextlandmark);
      $nextlandmark = new Landmark();
      $nextlandmark->setName("abyssalgateofmarinda");
      $html = <<<HTML
  <h4>Abyssal Gate of Marinda</h4>
  <p>
    Marinda was, until recently, a bustling trading hub of the Morrind, until the appearance of an abyssal gate.  The
    city is now an extension of the abyss into the mortal realm, a literal hell on earth.  The gate stands open in what
    was once the center of the city, and demons move freely between this realm and their own.  It is a war that has
    consumed the Morrind for nearly a year now, as they desperately try to contain the demon invasion.  It is also the
    first war in a thousand years that the trollkin have fought on their own behalf, as they have marshalled all of
    their available armies to stem the tide, and keep the demons from reaching their homeland of Degak'Ta.
  </p>
HTML;
      $nextlandmark->setHtml($html);
      $manager->persist($nextlandmark);
      $nextlandmark = new Landmark();
      $nextlandmark->setName("dalokra");
      $html = <<<HTML
  <h4>Dal Okra</h4>
  <p>
    Literally in Orcish "Dal Okra" means Home of the Orcs. It is an ancient name for the place of legend where the
    orc race was first created. Whether that was actually the huge black mountain called Dal Okra today is a question
    for debate, as that history was lost in the God's War. Dal Okra today is a huge empty tomb, once holding the Prince of
    Fiends, a believed dead Sorceron, who once commanded at least part of the orc legions in the God's War before he
    was struck down by Michael, the Archangel of Alohim.  Now he is awake again, and has taken nearly complete control
    of the orcish tribes.
  </p>
HTML;
      $nextlandmark->setHtml($html);
      $manager->persist($nextlandmark);
      $nextlandmark = new Landmark();
      $nextlandmark->setName("dera");
      $html = <<<HTML
  <h4>Dera</h4>
  <p>
    Once the capital of the Deran empire, now an ancient ruin destroyed by demons.  Yet it is not uninhabited.
    Underground, in the deep sewers, live the Fey'ri, a bastard race of elves and demons.  The spawn of the inhabitants
    of the first towns to be destroyed by the demons.  
  </p>
HTML;
      $nextlandmark->setHtml($html);
      $manager->persist($nextlandmark);
      $nextlandmark = new Landmark();
      $nextlandmark->setName("fang");
      $html = <<<HTML
  <h4>Fang</h4>
  <p>
    The white mountain, Fang, is the center of Sand Orc society. The mountain is home to an extensive system of natural caves, which they have greatly
    enlarged, and several cool springs that supply an abundance of water. As such it serves as trading post and wintering location for the Sand Orcs. It
    is also the location their chiefs meet in order to discuss any matters that involve all of the tribes. It is a place of peace, and no sand orc is
    allowed to raise a hand against another while at or near Fang.
  </p>
HTML;
      $nextlandmark->setHtml($html);
      $manager->persist($nextlandmark);
      $nextlandmark = new Landmark();
      $nextlandmark->setName("fortressoflight");
      $html = <<<HTML
  <h4>Fortress of Light</h4>
  <p>
    The Fortress of Light is a massive joint venture defensive fortress and staging facility manned by dwarves, humans, and elves from Gerasalim,
    Dormania, Kandor, Curinor, Demal Thor, and Eldoran. It is the central supply dump and gathering point for campaigns and troop movements in the
    defense against attacking orcs, trolls, gnolls, and various goblinoids coming across arid plain known as the Blighted Gap.
  </p>
  <p>
    The fortress itself is built surrounding a small springfed lake, and covers nearly 3 square miles. It's outer wall extend up 150 feet of sheer stone
    braced with adamantium, without joint or crack, and they are nearly 15 foot thick. Several large inner keeps, built similarly to the outer wall,
    extend up some 200-250 feet. Large counterspelling crystals instantly counter any spell cast at or near the fortress. A dry moat, filled with thick
    steel spikes, extends out 25 feet from the edge of the wall.
  </p>
HTML;
      $nextlandmark->setHtml($html);
      $manager->persist($nextlandmark);
      $nextlandmark = new Landmark();
      $nextlandmark->setName("gaiasgrove");
      $html = <<<HTML
  <h4>Gaia's Grove</h4>
  <p>
    The Dreaming Goddess, Gaia, Who Dreams No More.  Such is the line the druids have told in recent months, encouraging pilgrims to come to the
    wild island of Gnarra to see the hidden grove where Gaia, until recently, slept.  About 20 miles in from the south coast of Gnarra the grove is
    guarded by the Faelin, who speak little about the events that led to the Goddess awakening, only saying she was 'saved' by a group of adventurers
    and a mighty druid.  No one will say what she was saved from.
  </p>
  <p>
    The grove itself has only 1 small entrance, with no other path through the tangle of branches and trees that form an impenetrable dome around the
    living altar.
  </p>
HTML;
      $nextlandmark->setHtml($html);
      $manager->persist($nextlandmark);
      $nextlandmark = new Landmark();
      $nextlandmark->setName("godspire");
      $html = <<<HTML
  <h4>God Spire</h4>
  <p>
    The God Spire is a relic of the age before the God's War located in north central Eldoran. It is a 500 foot tall metallic spire, with inscriptions
    covering it written in an unknown heiroglyphic language. It is believed to be a shrine once dedicated to some now dead God, but no one really knows
    its purpose or what may be inside.
  </p>
HTML;
      $nextlandmark->setHtml($html);
      $manager->persist($nextlandmark);
      $nextlandmark = new Landmark();
      $nextlandmark->setName("greatramp");
      $html = <<<HTML
  <h4>Great Ramp</h4>
  <p>
    The Great Ramp was built by Dorman III to connect the wizards college at Malidal with the rest of the empire without having to travel hundreds of
    miles by sea. It was a massive public works project that employed nearly 300,000 people during a period of relative peace for the Empire and
    construction took 23 years. Shortly after its completion Dorman III died of a heart attack.
  </p>
HTML;
      $nextlandmark->setHtml($html);
      $manager->persist($nextlandmark);
      $nextlandmark = new Landmark();
      $nextlandmark->setName("irontraingle");
      $html = <<<HTML
  <h4>Iron Triangle</h4>
  <p>
    The Iron Triangle is three fortresses built equidistant from each other in northeast Nerim, each about half a mile from the other two. In their day
    the three fortresses were the greatest defensive structure in the world, although they never endured much test beyond disorganized rebel groups.
    Today they are (mostly) uninhabited ruins, but they are still imposing and difficult to capture should anyone choose to defend them.
  </p>
HTML;
      $nextlandmark->setHtml($html);
      $manager->persist($nextlandmark);
      $nextlandmark = new Landmark();
      $nextlandmark->setName("nerim");
      $html = <<<HTML
  <h4>Nerim</h4>
  <p>
    Nerim was once the seat of the Neran Empire, a monotheistic continent spanning empire.  It was here that the great spell was cast that turned the
    population of the continent into armies of the undead, millions strong.  The city still stands, largely undamaged, preserved by the dry air, and
    the inability of growing things to survive in the lingering negative energy presence.
  </p>
HTML;
      $nextlandmark->setHtml($html);
      $manager->persist($nextlandmark);
      $nextlandmark = new Landmark();
      $nextlandmark->setName("peloria");
      $html = <<<HTML
  <h4>Peloria</h4>
  <p>
    The city of peloria was a rowdy bustling trading hub before the Nerim Cataclysm.  It was, at the time, one of the wealthiest and most cosmopolitan
    cities of Malinval, even elves could walk the streets with a reasonable expectation of going unmolested.
  </p>
  <p>
    After the cataclysm, armies of undead poured out of the subcontinent of Nerim, across what was then a relatively narrow channel between it and
    Elathia. The unwalled and poorly defended city, far from the war fronts the orcs were used to fighting on, was quickly overrun.  Those who did not
    escape were killed, and while the undead were driven back and eventually destroyed, the Champions of Cora who led the charge felt no pity for the
    Mat'raktha worshipping orcs, and bypassed the city on their way to Nerim.  The city remains a nest of the undead to this day.
  </p>
HTML;
      $nextlandmark->setHtml($html);
      $manager->persist($nextlandmark);
      $nextlandmark = new Landmark();
      $nextlandmark->setName("sorcerersprison");
      $html = <<<HTML
  <h4>Sorcerer's Prison</h4>
  <p>
    The Sorcerer's Prison is believed to be the single greatest work of magic since the God's War. Created by the wizards of Zelfir to contain their once
    master, a powerful Sorceron enchanter of unknown name, it is a huge magical barrier which it is possible to enter from the outside, but impossible to
    get out of from within. The barrier forms a massive sphere, with the center at ground level such that it is impossible to fly or dig oneself out. The
    surface of the barrier is silvery and impossible to see through. The barrier has stood for thousands of years without anyone ever escaping.
  </p>
HTML;
      $nextlandmark->setHtml($html);
      $manager->persist($nextlandmark);
      $manager->flush();
      }
  }