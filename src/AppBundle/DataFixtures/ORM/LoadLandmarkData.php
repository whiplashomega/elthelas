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
      
      $manager->flush();
      }
  }