<?php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use JsonSerializable;

  /**
   *@ORM\Entity
   *@ORM\Table(name="creature")
   */
class Creature implements JsonSerializable {
  
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
  protected $race;
  
  /**
   *@ORM\Column(type="string", nullable=true)
   */
  protected $classlevel;
  
  /**
   *@ORM\Column(type="string", nullable=true)
   */
  protected $background;
  /**
   *@ORM\Column(type="string", nullable=true)
   */
  protected $alignment;
  
  /**
   *ORM\Column(type="experience", nullable=true)
   */
  protected $experience;
  
  /**
   *ORM\Column(type="CR", nullable=true)
   */
  protected $cr;
  
  /**
   *ORM\Column(type="integer", nullable=true)
   */
  protected $proficiencybonus;
  
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
  protected $hpmax;
  
  /**
   *@ORM\Column(type="integer", nullable=true)
   */
  protected $hitdice;
  
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
   * @ORM\OneToMany(targetEntity="Attack", mappedBy="creature")
   */
  protected $attacks;

  /**
   *@ORM\Column(type="text", nullable=true)
   */
  protected $possessions;

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
   *@ORM\ManyToOne(targetEntity="User", inversedBy="creatures")
   *@ORM\JoinColumn(name="user_id", referencedColumnName="id")
   */
  protected $ownedby;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->attacks = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    public function __set($name, $value) {
        $this->$name = $value;
        
        return $this;
    }
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set race
     *
     * @param string $race
     * @return Creature
     */
    public function setRace($race)
    {
        $this->race = $race;

        return $this;
    }

    /**
     * Get race
     *
     * @return string 
     */
    public function getRace()
    {
        return $this->race;
    }

    /**
     * Set classlevel
     *
     * @param string $classlevel
     * @return Creature
     */
    public function setClasslevel($classlevel)
    {
        $this->classlevel = $classlevel;

        return $this;
    }

    /**
     * Get classlevel
     *
     * @return string 
     */
    public function getClasslevel()
    {
        return $this->classlevel;
    }

    /**
     * Set background
     *
     * @param string $background
     * @return Creature
     */
    public function setBackground($background)
    {
        $this->background = $background;

        return $this;
    }

    /**
     * Get background
     *
     * @return string 
     */
    public function getBackground()
    {
        return $this->background;
    }

    /**
     * Set str
     *
     * @param integer $str
     * @return Creature
     */
    public function setStr($str)
    {
        $this->str = $str;

        return $this;
    }

    /**
     * Get str
     *
     * @return integer 
     */
    public function getStr()
    {
        return $this->str;
    }

    /**
     * Set dex
     *
     * @param integer $dex
     * @return Creature
     */
    public function setDex($dex)
    {
        $this->dex = $dex;

        return $this;
    }

    /**
     * Get dex
     *
     * @return integer 
     */
    public function getDex()
    {
        return $this->dex;
    }

    /**
     * Set con
     *
     * @param integer $con
     * @return Creature
     */
    public function setCon($con)
    {
        $this->con = $con;

        return $this;
    }

    /**
     * Get con
     *
     * @return integer 
     */
    public function getCon()
    {
        return $this->con;
    }

    /**
     * Set wis
     *
     * @param integer $wis
     * @return Creature
     */
    public function setWis($wis)
    {
        $this->wis = $wis;

        return $this;
    }

    /**
     * Get wis
     *
     * @return integer 
     */
    public function getWis()
    {
        return $this->wis;
    }

    /**
     * Set cha
     *
     * @param integer $cha
     * @return Creature
     */
    public function setCha($cha)
    {
        $this->cha = $cha;

        return $this;
    }

    /**
     * Get cha
     *
     * @return integer 
     */
    public function getCha()
    {
        return $this->cha;
    }

    /**
     * Set strsave
     *
     * @param integer $strsave
     * @return Creature
     */
    public function setStrsave($strsave)
    {
        $this->strsave = $strsave;

        return $this;
    }

    /**
     * Get strsave
     *
     * @return integer 
     */
    public function getStrsave()
    {
        return $this->strsave;
    }

    /**
     * Set dexsave
     *
     * @param integer $dexsave
     * @return Creature
     */
    public function setDexsave($dexsave)
    {
        $this->dexsave = $dexsave;

        return $this;
    }

    /**
     * Get dexsave
     *
     * @return integer 
     */
    public function getDexsave()
    {
        return $this->dexsave;
    }

    /**
     * Set consave
     *
     * @param integer $consave
     * @return Creature
     */
    public function setConsave($consave)
    {
        $this->consave = $consave;

        return $this;
    }

    /**
     * Get consave
     *
     * @return integer 
     */
    public function getConsave()
    {
        return $this->consave;
    }

    /**
     * Set intsave
     *
     * @param integer $intsave
     * @return Creature
     */
    public function setIntsave($intsave)
    {
        $this->intsave = $intsave;

        return $this;
    }

    /**
     * Get intsave
     *
     * @return integer 
     */
    public function getIntsave()
    {
        return $this->intsave;
    }

    /**
     * Set wissave
     *
     * @param integer $wissave
     * @return Creature
     */
    public function setWissave($wissave)
    {
        $this->wissave = $wissave;

        return $this;
    }

    /**
     * Get wissave
     *
     * @return integer 
     */
    public function getWissave()
    {
        return $this->wissave;
    }

    /**
     * Set chasave
     *
     * @param integer $chasave
     * @return Creature
     */
    public function setChasave($chasave)
    {
        $this->chasave = $chasave;

        return $this;
    }

    /**
     * Get chasave
     *
     * @return integer 
     */
    public function getChasave()
    {
        return $this->chasave;
    }

    /**
     * Set hpmax
     *
     * @param integer $hpmax
     * @return Creature
     */
    public function setHpmax($hpmax)
    {
        $this->hpmax = $hpmax;

        return $this;
    }

    /**
     * Get hpmax
     *
     * @return integer 
     */
    public function getHpmax()
    {
        return $this->hpmax;
    }

    /**
     * Set hitdice
     *
     * @param integer $hitdice
     * @return Creature
     */
    public function setHitdice($hitdice)
    {
        $this->hitdice = $hitdice;

        return $this;
    }

    /**
     * Get hitdice
     *
     * @return integer 
     */
    public function getHitdice()
    {
        return $this->hitdice;
    }

    /**
     * Set passiveperception
     *
     * @param integer $passiveperception
     * @return Creature
     */
    public function setPassiveperception($passiveperception)
    {
        $this->passiveperception = $passiveperception;

        return $this;
    }

    /**
     * Get passiveperception
     *
     * @return integer 
     */
    public function getPassiveperception()
    {
        return $this->passiveperception;
    }

    /**
     * Set acrobatics
     *
     * @param integer $acrobatics
     * @return Creature
     */
    public function setAcrobatics($acrobatics)
    {
        $this->acrobatics = $acrobatics;

        return $this;
    }

    /**
     * Get acrobatics
     *
     * @return integer 
     */
    public function getAcrobatics()
    {
        return $this->acrobatics;
    }

    /**
     * Set animalhandling
     *
     * @param integer $animalhandling
     * @return Creature
     */
    public function setAnimalhandling($animalhandling)
    {
        $this->animalhandling = $animalhandling;

        return $this;
    }

    /**
     * Get animalhandling
     *
     * @return integer 
     */
    public function getAnimalhandling()
    {
        return $this->animalhandling;
    }

    /**
     * Set arcana
     *
     * @param integer $arcana
     * @return Creature
     */
    public function setArcana($arcana)
    {
        $this->arcana = $arcana;

        return $this;
    }

    /**
     * Get arcana
     *
     * @return integer 
     */
    public function getArcana()
    {
        return $this->arcana;
    }

    /**
     * Set athletics
     *
     * @param integer $athletics
     * @return Creature
     */
    public function setAthletics($athletics)
    {
        $this->athletics = $athletics;

        return $this;
    }

    /**
     * Get athletics
     *
     * @return integer 
     */
    public function getAthletics()
    {
        return $this->athletics;
    }

    /**
     * Set deception
     *
     * @param integer $deception
     * @return Creature
     */
    public function setDeception($deception)
    {
        $this->deception = $deception;

        return $this;
    }

    /**
     * Get deception
     *
     * @return integer 
     */
    public function getDeception()
    {
        return $this->deception;
    }

    /**
     * Set history
     *
     * @param integer $history
     * @return Creature
     */
    public function setHistory($history)
    {
        $this->history = $history;

        return $this;
    }

    /**
     * Get history
     *
     * @return integer 
     */
    public function getHistory()
    {
        return $this->history;
    }

    /**
     * Set insight
     *
     * @param integer $insight
     * @return Creature
     */
    public function setInsight($insight)
    {
        $this->insight = $insight;

        return $this;
    }

    /**
     * Get insight
     *
     * @return integer 
     */
    public function getInsight()
    {
        return $this->insight;
    }

    /**
     * Set intimidation
     *
     * @param integer $intimidation
     * @return Creature
     */
    public function setIntimidation($intimidation)
    {
        $this->intimidation = $intimidation;

        return $this;
    }

    /**
     * Get intimidation
     *
     * @return integer 
     */
    public function getIntimidation()
    {
        return $this->intimidation;
    }

    /**
     * Set investigation
     *
     * @param integer $investigation
     * @return Creature
     */
    public function setInvestigation($investigation)
    {
        $this->investigation = $investigation;

        return $this;
    }

    /**
     * Get investigation
     *
     * @return integer 
     */
    public function getInvestigation()
    {
        return $this->investigation;
    }

    /**
     * Set medicine
     *
     * @param integer $medicine
     * @return Creature
     */
    public function setMedicine($medicine)
    {
        $this->medicine = $medicine;

        return $this;
    }

    /**
     * Get medicine
     *
     * @return integer 
     */
    public function getMedicine()
    {
        return $this->medicine;
    }

    /**
     * Set nature
     *
     * @param integer $nature
     * @return Creature
     */
    public function setNature($nature)
    {
        $this->nature = $nature;

        return $this;
    }

    /**
     * Get nature
     *
     * @return integer 
     */
    public function getNature()
    {
        return $this->nature;
    }

    /**
     * Set perception
     *
     * @param integer $perception
     * @return Creature
     */
    public function setPerception($perception)
    {
        $this->perception = $perception;

        return $this;
    }

    /**
     * Get perception
     *
     * @return integer 
     */
    public function getPerception()
    {
        return $this->perception;
    }

    /**
     * Set performance
     *
     * @param integer $performance
     * @return Creature
     */
    public function setPerformance($performance)
    {
        $this->performance = $performance;

        return $this;
    }

    /**
     * Get performance
     *
     * @return integer 
     */
    public function getPerformance()
    {
        return $this->performance;
    }

    /**
     * Set persuasion
     *
     * @param integer $persuasion
     * @return Creature
     */
    public function setPersuasion($persuasion)
    {
        $this->persuasion = $persuasion;

        return $this;
    }

    /**
     * Get persuasion
     *
     * @return integer 
     */
    public function getPersuasion()
    {
        return $this->persuasion;
    }

    /**
     * Set religion
     *
     * @param integer $religion
     * @return Creature
     */
    public function setReligion($religion)
    {
        $this->religion = $religion;

        return $this;
    }

    /**
     * Get religion
     *
     * @return integer 
     */
    public function getReligion()
    {
        return $this->religion;
    }

    /**
     * Set slightofhand
     *
     * @param integer $slightofhand
     * @return Creature
     */
    public function setSlightofhand($slightofhand)
    {
        $this->slightofhand = $slightofhand;

        return $this;
    }

    /**
     * Get slightofhand
     *
     * @return integer 
     */
    public function getSlightofhand()
    {
        return $this->slightofhand;
    }

    /**
     * Set stealth
     *
     * @param integer $stealth
     * @return Creature
     */
    public function setStealth($stealth)
    {
        $this->stealth = $stealth;

        return $this;
    }

    /**
     * Get stealth
     *
     * @return integer 
     */
    public function getStealth()
    {
        return $this->stealth;
    }

    /**
     * Set survival
     *
     * @param integer $survival
     * @return Creature
     */
    public function setSurvival($survival)
    {
        $this->survival = $survival;

        return $this;
    }

    /**
     * Get survival
     *
     * @return integer 
     */
    public function getSurvival()
    {
        return $this->survival;
    }

    /**
     * Set possessions
     *
     * @param string $possessions
     * @return Creature
     */
    public function setPossessions($possessions)
    {
        $this->possessions = $possessions;

        return $this;
    }

    /**
     * Get possessions
     *
     * @return string 
     */
    public function getPossessions()
    {
        return $this->possessions;
    }

    /**
     * Set features
     *
     * @param string $features
     * @return Creature
     */
    public function setFeatures($features)
    {
        $this->features = $features;

        return $this;
    }

    /**
     * Get features
     *
     * @return string 
     */
    public function getFeatures()
    {
        return $this->features;
    }

    /**
     * Set physicaldescription
     *
     * @param string $physicaldescription
     * @return Creature
     */
    public function setPhysicaldescription($physicaldescription)
    {
        $this->physicaldescription = $physicaldescription;

        return $this;
    }

    /**
     * Get physicaldescription
     *
     * @return string 
     */
    public function getPhysicaldescription()
    {
        return $this->physicaldescription;
    }

    /**
     * Set imagepath
     *
     * @param string $imagepath
     * @return Creature
     */
    public function setImagepath($imagepath)
    {
        $this->imagepath = $imagepath;

        return $this;
    }

    /**
     * Get imagepath
     *
     * @return string 
     */
    public function getImagepath()
    {
        return $this->imagepath;
    }

    /**
     * Add attacks
     *
     * @param \AppBundle\Entity\Attack $attacks
     * @return Creature
     */
    public function addAttack(\AppBundle\Entity\Attack $attacks)
    {
        $this->attacks[] = $attacks;

        return $this;
    }

    /**
     * Remove attacks
     *
     * @param \AppBundle\Entity\Attack $attacks
     */
    public function removeAttack(\AppBundle\Entity\Attack $attacks)
    {
        $this->attacks->removeElement($attacks);
    }

    /**
     * Get attacks
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAttacks()
    {
        return $this->attacks;
    }
    public function jsonSerialize() {
      $json = array();
      foreach($this as $key => $value) {
        $json[$key] = $value;
      }
      return $json;
    }

    /**
     * Set ownedby
     *
     * @param \AppBundle\Entity\User $ownedby
     * @return Creature
     */
    public function setOwnedby(\AppBundle\Entity\User $ownedby = null)
    {
        $this->ownedby = $ownedby;

        return $this;
    }

    /**
     * Get ownedby
     *
     * @return \AppBundle\Entity\User 
     */
    public function getOwnedby()
    {
        return $this->ownedby;
    }

    /**
     * Set intel
     *
     * @param integer $intel
     * @return Creature
     */
    public function setIntel($intel)
    {
        $this->intel = $intel;

        return $this;
    }

    /**
     * Get intel
     *
     * @return integer 
     */
    public function getIntel()
    {
        return $this->intel;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Creature
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set alignment
     *
     * @param string $alignment
     * @return Creature
     */
    public function setAlignment($alignment)
    {
        $this->alignment = $alignment;

        return $this;
    }

    /**
     * Get alignment
     *
     * @return string 
     */
    public function getAlignment()
    {
        return $this->alignment;
    }
}
