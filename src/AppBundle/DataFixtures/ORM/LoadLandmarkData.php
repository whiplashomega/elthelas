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
      $nextlandmark->setName("Dera");
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
      $nextlandmark->setName("peloria");
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
      $nextlandmark->setName("peloria");
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
      $nextlandmark->setName("peloria");
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
      /*
Dera
Fang
Fortress of Light
Gaia's Grove
God Spire
Great Ramp
Iron Triangle
Nerim
Peloria
Sorcerer's Prison
       */
      $manager->flush();
      }
  }