<?php

  namespace AppBundle\Entity;
  use FOS\UserBundle\Model\User as BaseUser;
  use Doctrine\ORM\Mapping as ORM;
  use Doctrine\Common\Collections\ArrayCollection;
  use JsonSerializable;
  
  /**
   *@ORM\Entity
   *@ORM\Table(name="ddcharacter")
   */
  class DDCharacter extends Creature implements JsonSerializable {
    
    /**
     *@ORM\Column(type="integer")
     *@ORM\Id
     *@ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
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
     *@ORM\Column(type="text", nullable=true)
     */
    protected $bond;
    
    /**
     *@ORM\Column(type="text", nullable=true)
     */
    protected $ideal;
    
    /**
     *@ORM\Column(type="text", nullable=true)
     */
    protected $flaw;
    
    /**
     *@ORM\Column(type="integer")
     */
    protected $proficiency;
    
    
    /**
     * @ORM\OneToMany(targetEntity="Attack", mappedBy="ddcharacter")
     */
    protected $attacks;

    /**
     *@ORM\OneToMany(targetEntity="Possession", mappedBy="ddcharacter")
     */
    protected $possessions;
    
    /**
     * @ORM\OneToMany(targetEntity="Spell", mappedBy="ddcharacter")
     */
    protected $spells; 
    
   /**
   *@ORM\ManyToOne(targetEntity="User", inversedBy="ddcharacters")
   *@ORM\JoinColumn(name="user_id", referencedColumnName="id")
   */
  protected $ownedby;
    
    public function __set($param, $value) {
      $this->$param = $value;
    }
    
    public function jsonSerialize() {
      $json = array();
      foreach($this as $key => $value) {
        if($key != "attacks" && $key != "spells") {
          $json[$key] = $value;
        } elseif($key === "attacks") {
          $json[$key] = array();
          for($x = 0; $x < count($this->attacks); $x++) {
            $json[$key][$x] = array();
            $json[$key][$x]["id"] = $this->attacks[$x]->getId();
            $json[$key][$x]["name"] = $this->attacks[$x]->getName();
            $json[$key][$x]["bonus"] = $this->attacks[$x]->getBonus();
            $json[$key][$x]["damage"] = $this->attacks[$x]->getDamage();
            $json[$key][$x]["damage"] = $this->attacks[$x]->getCrit();
          }
        } elseif($key === "possessions") {
          $json[$key] = array();
          for($x = 0; $x < count($this->possessions); $x++) {
              $json[$key][$x]["id"] = $this->possessions[$x]->getId();
              $json[$key][$x]["name"] = $this->possessions[$x]->getName();
              $json[$key][$x]["weight"] = $this->possessions[$x]->getWeight();
              $json[$key][$x]["value"] = $this->possessions[$x]->getValue();
              $json[$key][$x]["onperson"] = $this->possessions[$x]->getOnperson();
              $json[$key][$x]["equipped"] = $this->possessions[$x]->getEquipped();
              $json[$key][$x]["armortype"] = $this->possessions[$x]->getArmortype();
              $json[$key][$x]["ac"] = $this->possessions[$x]->getAc();
          }
        } elseif($key === "spells") {
          $json[$key] = array();
          for($x = 0; $x < count($this->spells); $x++) {
            $json[$key][$x]["id"] = $this->spells[$x]->getId();
            $json[$key][$x]["source"] = $this->spells[$x]->getSource();
            $json[$key][$x]["school"] = $this->spells[$x]->getSchool();
            $json[$key][$x]["level"] = $this->spells[$x]->getLevel();
            $json[$key][$x]["ritual"] = $this->spells[$x]->getRitual();
            $json[$key][$x]["castingtime"] = $this->spells[$x]->getCastingtime();
            $json[$key][$x]["range"] = $this->spells[$x]->getRange();
            $json[$key][$x]["components"] = $this->spells[$x]->getComponents();
            $json[$key][$x]["duration"] = $this->spells[$x]->getDuration();
            $json[$key][$x]["concentration"] = $this->spells[$x]->getConcentration();
            $json[$key][$x]["description"] = $this->spells[$x]->getDescription();
            $json[$key][$x]["higherlevels"] = $this->spells[$x]->getHigherlevels();
            $json[$key][$x]["fromclass"] = $this->spells[$x]->getFromclass();
            $json[$key][$x]["prepared"] = $this->spells[$x]->getPrepared();
            $json[$key][$x]["castingstat"] = $this->spells[$x]->getCastingstat();
          }
        }
      }
      return $json;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->attacks = new \Doctrine\Common\Collections\ArrayCollection();
        $this->possessions = new \Doctrine\Common\Collections\ArrayCollection();
        $this->spells = new \Doctrine\Common\Collections\ArrayCollection();
        $this->mediummaxac = 2;
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
     *
     * @return DDCharacter
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
     *
     * @return DDCharacter
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
     *
     * @return DDCharacter
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
     * Set proficiency
     *
     * @param integer $proficiency
     *
     * @return DDCharacter
     */
    public function setProficiency($proficiency)
    {
        $this->proficiency = $proficiency;

        return $this;
    }

    /**
     * Get proficiency
     *
     * @return integer
     */
    public function getProficiency()
    {
        return $this->proficiency;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return DDCharacter
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
     * Set type
     *
     * @param string $type
     *
     * @return DDCharacter
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set alignment
     *
     * @param string $alignment
     *
     * @return DDCharacter
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

    /**
     * Set str
     *
     * @param integer $str
     *
     * @return DDCharacter
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
     *
     * @return DDCharacter
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
     *
     * @return DDCharacter
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
     * Set intel
     *
     * @param integer $intel
     *
     * @return DDCharacter
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
     * Set wis
     *
     * @param integer $wis
     *
     * @return DDCharacter
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
     *
     * @return DDCharacter
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
     *
     * @return DDCharacter
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
     *
     * @return DDCharacter
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
     *
     * @return DDCharacter
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
     *
     * @return DDCharacter
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
     *
     * @return DDCharacter
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
     *
     * @return DDCharacter
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
     *
     * @return DDCharacter
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
     *
     * @return DDCharacter
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
     *
     * @return DDCharacter
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
     *
     * @return DDCharacter
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
     *
     * @return DDCharacter
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
     *
     * @return DDCharacter
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
     *
     * @return DDCharacter
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
     *
     * @return DDCharacter
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
     *
     * @return DDCharacter
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
     *
     * @return DDCharacter
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
     *
     * @return DDCharacter
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
     *
     * @return DDCharacter
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
     *
     * @return DDCharacter
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
     *
     * @return DDCharacter
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
     *
     * @return DDCharacter
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
     *
     * @return DDCharacter
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
     *
     * @return DDCharacter
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
     *
     * @return DDCharacter
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
     *
     * @return DDCharacter
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
     *
     * @return DDCharacter
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
     *
     * @return DDCharacter
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
     * Set ac
     *
     * @param integer $ac
     *
     * @return DDCharacter
     */
    public function setAc($ac)
    {
        $this->ac = $ac;

        return $this;
    }

    /**
     * Get ac
     *
     * @return integer
     */
    public function getAc()
    {
        return $this->ac;
    }

    /**
     * Set speed
     *
     * @param string $speed
     *
     * @return DDCharacter
     */
    public function setSpeed($speed)
    {
        $this->speed = $speed;

        return $this;
    }

    /**
     * Get speed
     *
     * @return string
     */
    public function getSpeed()
    {
        return $this->speed;
    }

    /**
     * Set features
     *
     * @param string $features
     *
     * @return DDCharacter
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
     *
     * @return DDCharacter
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
     *
     * @return DDCharacter
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
     * Set cr
     *
     * @param integer $cr
     *
     * @return DDCharacter
     */
    public function setCr($cr)
    {
        $this->cr = $cr;

        return $this;
    }

    /**
     * Get cr
     *
     * @return integer
     */
    public function getCr()
    {
        return $this->cr;
    }

    /**
     * Set proficiencybonus
     *
     * @param integer $proficiencybonus
     *
     * @return DDCharacter
     */
    public function setProficiencybonus($proficiencybonus)
    {
        $this->proficiencybonus = $proficiencybonus;

        return $this;
    }

    /**
     * Get proficiencybonus
     *
     * @return integer
     */
    public function getProficiencybonus()
    {
        return $this->proficiencybonus;
    }

    /**
     * Set damageresistances
     *
     * @param string $damageresistances
     *
     * @return DDCharacter
     */
    public function setDamageresistances($damageresistances)
    {
        $this->damageresistances = $damageresistances;

        return $this;
    }

    /**
     * Get damageresistances
     *
     * @return string
     */
    public function getDamageresistances()
    {
        return $this->damageresistances;
    }

    /**
     * Set immunities
     *
     * @param string $immunities
     *
     * @return DDCharacter
     */
    public function setImmunities($immunities)
    {
        $this->immunities = $immunities;

        return $this;
    }

    /**
     * Get immunities
     *
     * @return string
     */
    public function getImmunities()
    {
        return $this->immunities;
    }

    /**
     * Set senses
     *
     * @param string $senses
     *
     * @return DDCharacter
     */
    public function setSenses($senses)
    {
        $this->senses = $senses;

        return $this;
    }

    /**
     * Get senses
     *
     * @return string
     */
    public function getSenses()
    {
        return $this->senses;
    }

    /**
     * Set languages
     *
     * @param string $languages
     *
     * @return DDCharacter
     */
    public function setLanguages($languages)
    {
        $this->languages = $languages;

        return $this;
    }

    /**
     * Get languages
     *
     * @return string
     */
    public function getLanguages()
    {
        return $this->languages;
    }

    /**
     * Set experience
     *
     * @param integer $experience
     *
     * @return DDCharacter
     */
    public function setExperience($experience)
    {
        $this->experience = $experience;

        return $this;
    }

    /**
     * Get experience
     *
     * @return integer
     */
    public function getExperience()
    {
        return $this->experience;
    }

    /**
     * Add attack
     *
     * @param \AppBundle\Entity\Attack $attack
     *
     * @return DDCharacter
     */
    public function addAttack(\AppBundle\Entity\Attack $attack)
    {
        $this->attacks[] = $attack;

        return $this;
    }

    /**
     * Remove attack
     *
     * @param \AppBundle\Entity\Attack $attack
     */
    public function removeAttack(\AppBundle\Entity\Attack $attack)
    {
        $this->attacks->removeElement($attack);
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

    /**
     * Add possession
     *
     * @param \AppBundle\Entity\Possession $possession
     *
     * @return DDCharacter
     */
    public function addPossession(\AppBundle\Entity\Possession $possession)
    {
        $this->possessions[] = $possession;

        return $this;
    }

    /**
     * Remove possession
     *
     * @param \AppBundle\Entity\Possession $possession
     */
    public function removePossession(\AppBundle\Entity\Possession $possession)
    {
        $this->possessions->removeElement($possession);
    }

    /**
     * Get possessions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPossessions()
    {
        return $this->possessions;
    }

    /**
     * Add spell
     *
     * @param \AppBundle\Entity\Spell $spell
     *
     * @return DDCharacter
     */
    public function addSpell(\AppBundle\Entity\Spell $spell)
    {
        $this->spells[] = $spell;

        return $this;
    }

    /**
     * Remove spell
     *
     * @param \AppBundle\Entity\Spell $spell
     */
    public function removeSpell(\AppBundle\Entity\Spell $spell)
    {
        $this->spells->removeElement($spell);
    }

    /**
     * Get spells
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSpells()
    {
        return $this->spells;
    }

    /**
     * Set ownedby
     *
     * @param \AppBundle\Entity\User $ownedby
     *
     * @return DDCharacter
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
     * Set d6hitdice
     *
     * @param integer $d6hitdice
     *
     * @return DDCharacter
     */
    public function setD6hitdice($d6hitdice)
    {
        $this->d6hitdice = $d6hitdice;

        return $this;
    }

    /**
     * Get d6hitdice
     *
     * @return integer
     */
    public function getD6hitdice()
    {
        return $this->d6hitdice;
    }

    /**
     * Set d8hitdice
     *
     * @param integer $d8hitdice
     *
     * @return DDCharacter
     */
    public function setD8hitdice($d8hitdice)
    {
        $this->d8hitdice = $d8hitdice;

        return $this;
    }

    /**
     * Get d8hitdice
     *
     * @return integer
     */
    public function getD8hitdice()
    {
        return $this->d8hitdice;
    }

    /**
     * Set d10hitdice
     *
     * @param integer $d10hitdice
     *
     * @return DDCharacter
     */
    public function setD10hitdice($d10hitdice)
    {
        $this->d10hitdice = $d10hitdice;

        return $this;
    }

    /**
     * Get d10hitdice
     *
     * @return integer
     */
    public function getD10hitdice()
    {
        return $this->d10hitdice;
    }

    /**
     * Set d12hitdice
     *
     * @param integer $d12hitdice
     *
     * @return DDCharacter
     */
    public function setD12hitdice($d12hitdice)
    {
        $this->d12hitdice = $d12hitdice;

        return $this;
    }

    /**
     * Get d12hitdice
     *
     * @return integer
     */
    public function getD12hitdice()
    {
        return $this->d12hitdice;
    }

    /**
     * Set hpcurrent
     *
     * @param integer $hpcurrent
     *
     * @return DDCharacter
     */
    public function setHpcurrent($hpcurrent)
    {
        $this->hpcurrent = $hpcurrent;

        return $this;
    }

    /**
     * Get hpcurrent
     *
     * @return integer
     */
    public function getHpcurrent()
    {
        return $this->hpcurrent;
    }

    /**
     * Set hptemp
     *
     * @param integer $hptemp
     *
     * @return DDCharacter
     */
    public function setHptemp($hptemp)
    {
        $this->hptemp = $hptemp;

        return $this;
    }

    /**
     * Get hptemp
     *
     * @return integer
     */
    public function getHptemp()
    {
        return $this->hptemp;
    }

    /**
     * Set d6hitdicecur
     *
     * @param integer $d6hitdicecur
     *
     * @return DDCharacter
     */
    public function setD6hitdicecur($d6hitdicecur)
    {
        $this->d6hitdicecur = $d6hitdicecur;

        return $this;
    }

    /**
     * Get d6hitdicecur
     *
     * @return integer
     */
    public function getD6hitdicecur()
    {
        return $this->d6hitdicecur;
    }

    /**
     * Set d8hitdicecur
     *
     * @param integer $d8hitdicecur
     *
     * @return DDCharacter
     */
    public function setD8hitdicecur($d8hitdicecur)
    {
        $this->d8hitdicecur = $d8hitdicecur;

        return $this;
    }

    /**
     * Get d8hitdicecur
     *
     * @return integer
     */
    public function getD8hitdicecur()
    {
        return $this->d8hitdicecur;
    }

    /**
     * Set d10hitdicecur
     *
     * @param integer $d10hitdicecur
     *
     * @return DDCharacter
     */
    public function setD10hitdicecur($d10hitdicecur)
    {
        $this->d10hitdicecur = $d10hitdicecur;

        return $this;
    }

    /**
     * Get d10hitdicecur
     *
     * @return integer
     */
    public function getD10hitdicecur()
    {
        return $this->d10hitdicecur;
    }

    /**
     * Set d12hitdicecur
     *
     * @param integer $d12hitdicecur
     *
     * @return DDCharacter
     */
    public function setD12hitdicecur($d12hitdicecur)
    {
        $this->d12hitdicecur = $d12hitdicecur;

        return $this;
    }

    /**
     * Get d12hitdicecur
     *
     * @return integer
     */
    public function getD12hitdicecur()
    {
        return $this->d12hitdicecur;
    }

    /**
     * Set unarmoredstat
     *
     * @param string $unarmoredstat
     *
     * @return DDCharacter
     */
    public function setUnarmoredstat($unarmoredstat)
    {
        $this->unarmoredstat = $unarmoredstat;

        return $this;
    }

    /**
     * Get unarmoredstat
     *
     * @return string
     */
    public function getUnarmoredstat()
    {
        return $this->unarmoredstat;
    }

    /**
     * Set mediummaxac
     *
     * @param integer $mediummaxac
     *
     * @return DDCharacter
     */
    public function setMediummaxac($mediummaxac)
    {
        $this->mediummaxac = $mediummaxac;

        return $this;
    }

    /**
     * Get mediummaxac
     *
     * @return integer
     */
    public function getMediummaxac()
    {
        return $this->mediummaxac;
    }

    /**
     * Set bond
     *
     * @param string $bond
     *
     * @return DDCharacter
     */
    public function setBond($bond)
    {
        $this->bond = $bond;

        return $this;
    }

    /**
     * Get bond
     *
     * @return string
     */
    public function getBond()
    {
        return $this->bond;
    }

    /**
     * Set ideal
     *
     * @param string $ideal
     *
     * @return DDCharacter
     */
    public function setIdeal($ideal)
    {
        $this->ideal = $ideal;

        return $this;
    }

    /**
     * Get ideal
     *
     * @return string
     */
    public function getIdeal()
    {
        return $this->ideal;
    }

    /**
     * Set flaw
     *
     * @param string $flaw
     *
     * @return DDCharacter
     */
    public function setFlaw($flaw)
    {
        $this->flaw = $flaw;

        return $this;
    }

    /**
     * Get flaw
     *
     * @return string
     */
    public function getFlaw()
    {
        return $this->flaw;
    }
}
