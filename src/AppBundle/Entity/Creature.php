<?php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use JsonSerializable;

  /**
   *@ORM\MappedSuperclass
   */
class Creature {
  
  /**
    *@ORM\Column(type="integer")
    *@ORM\Id
    *@ORM\GeneratedValue(strategy="AUTO")
    */
  protected $id;
  
  /**
   *@ORM\Column(type="string", nullable=true)
   */
  protected $name;
  
  /**
   *@ORM\Column(type="string", nullable=true)
   */
  protected $type;
  
  /**
   *@ORM\Column(type="string", nullable=true)
   */
  protected $alignment;
  
  /**
   *@ORM\Column(type="integer", nullable=true)
   */
  protected $str;

  /**
   *@ORM\Column(type="integer", nullable=true)
   */
  protected $dex;
  
  /**
   *@ORM\Column(type="integer", nullable=true)
   */
  protected $con;
  
  /**
   *@ORM\Column(type="integer", nullable=true)
   */
  protected $intel;
  
  /**
   *@ORM\Column(type="integer", nullable=true)
   */
  protected $wis;
  
  /**
   *@ORM\Column(type="integer", nullable=true)
   */
  protected $cha;
  
  /**
   *@ORM\Column(type="integer", nullable=true)
   */
  protected $strsave;

  /**
   *@ORM\Column(type="integer", nullable=true)
   */
  protected $dexsave;
  
  /**
   *@ORM\Column(type="integer", nullable=true)
   */
  protected $consave;
  
  /**
   *@ORM\Column(type="integer", nullable=true)
   */
  protected $intsave;
  
  /**
   *@ORM\Column(type="integer", nullable=true)
   */
  protected $wissave;
  
  /**
   *@ORM\Column(type="integer", nullable=true)
   */
  protected $chasave;
  
  /**
   *@ORM\Column(type="integer", nullable=true)
   */
  protected $hpcurrent;
  
  /**
   *@ORM\Column(type="integer", nullable=true)
   */
  protected $hpmax;
  
  /**
   *@ORM\Column(type="integer", nullable=true)
   */
  protected $hptemp;
  
  /**
   *@ORM\Column(type="integer", nullable=true)
   */
  protected $d6hitdicecur;
  
  /**
   *@ORM\Column(type="integer", nullable=true)
   */
  protected $d6hitdice;
  
  /**
   *@ORM\Column(type="integer", nullable=true)
   */
  protected $d8hitdicecur;
  
  /**
   *@ORM\Column(type="integer", nullable=true)
   */
  protected $d8hitdice;
  
  /**
   *@ORM\Column(type="integer", nullable=true)
   */
  protected $d10hitdicecur; 
  
  /**
   *@ORM\Column(type="integer", nullable=true)
   */
  protected $d10hitdice;   
  
  /**
   *@ORM\Column(type="integer", nullable=true)
   */
  protected $d12hitdicecur;  
  
  /**
   *@ORM\Column(type="integer", nullable=true)
   */
  protected $d12hitdice;  
  
  /**
   *@ORM\Column(type="string", nullable=true)
   */
  protected $unarmoredstat;    
  
  /**
   *@ORM\Column(type="integer", nullable=true)
   */
  protected $passiveperception;
  
  /**
   *@ORM\Column(type="integer", nullable=true)
   */
  protected $acrobatics;
  
  /**
   *@ORM\Column(type="integer", nullable=true)
   */
  protected $animalhandling; 
  
  /**
   *@ORM\Column(type="integer", nullable=true)
   */
  protected $arcana;
  
  /**
   *@ORM\Column(type="integer", nullable=true)
   */
  protected $athletics;
  
  /**
   *@ORM\Column(type="integer", nullable=true)
   */
  protected $deception;
  
  /**
   *@ORM\Column(type="integer", nullable=true)
   */
  protected $history;
  
  /**
   *@ORM\Column(type="integer", nullable=true)
   */
  protected $insight;
  
  /**
   *@ORM\Column(type="integer", nullable=true)
   */
  protected $intimidation;
  
  /**
   *@ORM\Column(type="integer", nullable=true)
   */
  protected $investigation;
  
  /**
   *@ORM\Column(type="integer", nullable=true)
   */
  protected $medicine;
  
  /**
   *@ORM\Column(type="integer", nullable=true)
   */
  protected $nature;
  
  /**
   *@ORM\Column(type="integer", nullable=true)
   */
  protected $perception;
  
  /**
   *@ORM\Column(type="integer", nullable=true)
   */
  protected $performance;
  
  /**
   *@ORM\Column(type="integer", nullable=true)
   */
  protected $persuasion;
  
  /**
   *@ORM\Column(type="integer", nullable=true)
   */
  protected $religion;
  
  /**
   *@ORM\Column(type="integer", nullable=true)
   */
  protected $slightofhand;
  
  /**
   *@ORM\Column(type="integer", nullable=true)
   */
  protected $stealth;
  
  /**
   *@ORM\Column(type="integer", nullable=true)
   */
  protected $survival;
  
  /**
   *@ORM\Column(type="text", nullable=true)
   */
  protected $speed;
  
  /**
   *@ORM\Column(type="integer", nullable=true)
   */
  protected $mediummaxac;

  /**
   *@ORM\Column(type="text", nullable=true)
   */
  protected $features;

  /**
   *@ORM\Column(type="text", nullable=true)
   */
  protected $physicaldescription;

  /**
   *@ORM\Column(type="string", nullable=true)
   */
  protected $imagepath;
  
  /**
   *@ORM\Column(type="string", nullable=true)
   */
  protected $damageresistances;
  
  /**
   *@ORM\Column(type="string", nullable=true)
   */
  protected $immunities;
  
  /**
   *@ORM\Column(type="string", nullable=true)
   */
  protected $senses;
  
  /**
   *@ORM\Column(type="text", nullable=true)
   */
  protected $languages;
  
  /**
   *@ORM\Column(type="integer", nullable=true)
   */
  protected $experience;

}
