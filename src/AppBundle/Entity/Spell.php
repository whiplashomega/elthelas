<?php

  namespace AppBundle\Entity;
  use FOS\UserBundle\Model\User as BaseUser;
  use Doctrine\ORM\Mapping as ORM;
  use Doctrine\Common\Collections\ArrayCollection;
  use JsonSerializable;
  
  /**
   *@ORM\Entity
   *@ORM\Table(name="spellbook")
   */
  class Spell {
    /**
     *@ORM\Column(type="integer")
     *@ORM\Id
     *@ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     *@ORM\Column(type="string")
     */
    protected $title;
    
    /**
     *@ORM\Column(type="string", nullable=true)
     */
    protected $source;
    
    /**
     *@ORM\Column(type="string", nullable=true)
     */
    protected $school;
    
    /**
     *@ORM\Column(type="string", nullable=true)
     */
    protected $level;
    
    /**
     *@ORM\Column(type="boolean")
     */
    protected $ritual;
    
    /**
     *@ORM\Column(type="string", nullable=true)
     */
    protected $castingtime;
    
    /**
     *@ORM\Column(type="string", nullable=true)
     */
    protected $range;
    
    /**
     *@ORM\Column(type="string", nullable=true)
     */
    protected $components;
    
    /**
     *@ORM\Column(type="string", nullable=true)
     */
    protected $duration;
    
    /**
     *@ORM\Column(type="boolean")
     */
    protected $concentration;
    
    /**
     *@ORM\Column(type="text")
     */
    protected $description;
    
    /**
     *@ORM\Column(type="text")
     */
    protected $higherlevels;    
    
    /**
     *@ORM\Column(type="string", nullable=true)
     */
    protected $fromclass;
    
    /**
     *@ORM\Column(type="boolean")
     */
    protected $prepared;
    
    /**
     *@ORM\Column(type="string", nullable=true)
     */
    protected $castingstat;
    
    /**
     *@ORM\ManyToOne(targetEntity="Character", inversedBy="spells")
     *@ORM\JoinColumn(name="character_id", referencedColumnName="id")
     */
    protected $character;
  
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
     * Set title
     *
     * @param string $title
     *
     * @return Spell
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set source
     *
     * @param string $source
     *
     * @return Spell
     */
    public function setSource($source)
    {
        $this->source = $source;

        return $this;
    }

    /**
     * Get source
     *
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * Set school
     *
     * @param string $school
     *
     * @return Spell
     */
    public function setSchool($school)
    {
        $this->school = $school;

        return $this;
    }

    /**
     * Get school
     *
     * @return string
     */
    public function getSchool()
    {
        return $this->school;
    }

    /**
     * Set level
     *
     * @param string $level
     *
     * @return Spell
     */
    public function setLevel($level)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * Get level
     *
     * @return string
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Set ritual
     *
     * @param boolean $ritual
     *
     * @return Spell
     */
    public function setRitual($ritual)
    {
        $this->ritual = $ritual;

        return $this;
    }

    /**
     * Get ritual
     *
     * @return boolean
     */
    public function getRitual()
    {
        return $this->ritual;
    }

    /**
     * Set castingtime
     *
     * @param string $castingtime
     *
     * @return Spell
     */
    public function setCastingtime($castingtime)
    {
        $this->castingtime = $castingtime;

        return $this;
    }

    /**
     * Get castingtime
     *
     * @return string
     */
    public function getCastingtime()
    {
        return $this->castingtime;
    }

    /**
     * Set range
     *
     * @param string $range
     *
     * @return Spell
     */
    public function setRange($range)
    {
        $this->range = $range;

        return $this;
    }

    /**
     * Get range
     *
     * @return string
     */
    public function getRange()
    {
        return $this->range;
    }

    /**
     * Set components
     *
     * @param string $components
     *
     * @return Spell
     */
    public function setComponents($components)
    {
        $this->components = $components;

        return $this;
    }

    /**
     * Get components
     *
     * @return string
     */
    public function getComponents()
    {
        return $this->components;
    }

    /**
     * Set duration
     *
     * @param string $duration
     *
     * @return Spell
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * Get duration
     *
     * @return string
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Set concentration
     *
     * @param boolean $concentration
     *
     * @return Spell
     */
    public function setConcentration($concentration)
    {
        $this->concentration = $concentration;

        return $this;
    }

    /**
     * Get concentration
     *
     * @return boolean
     */
    public function getConcentration()
    {
        return $this->concentration;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Spell
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set higherlevels
     *
     * @param string $higherlevels
     *
     * @return Spell
     */
    public function setHigherlevels($higherlevels)
    {
        $this->higherlevels = $higherlevels;

        return $this;
    }

    /**
     * Get higherlevels
     *
     * @return string
     */
    public function getHigherlevels()
    {
        return $this->higherlevels;
    }

    /**
     * Set fromclass
     *
     * @param string $fromclass
     *
     * @return Spell
     */
    public function setFromclass($fromclass)
    {
        $this->fromclass = $fromclass;

        return $this;
    }

    /**
     * Get fromclass
     *
     * @return string
     */
    public function getFromclass()
    {
        return $this->fromclass;
    }

    /**
     * Set prepared
     *
     * @param boolean $prepared
     *
     * @return Spell
     */
    public function setPrepared($prepared)
    {
        $this->prepared = $prepared;

        return $this;
    }

    /**
     * Get prepared
     *
     * @return boolean
     */
    public function getPrepared()
    {
        return $this->prepared;
    }

    /**
     * Set castingstat
     *
     * @param string $castingstat
     *
     * @return Spell
     */
    public function setCastingstat($castingstat)
    {
        $this->castingstat = $castingstat;

        return $this;
    }

    /**
     * Get castingstat
     *
     * @return string
     */
    public function getCastingstat()
    {
        return $this->castingstat;
    }

    /**
     * Set character
     *
     * @param \AppBundle\Entity\Character $character
     *
     * @return Spell
     */
    public function setCharacter(\AppBundle\Entity\Character $character = null)
    {
        $this->character = $character;

        return $this;
    }

    /**
     * Get character
     *
     * @return \AppBundle\Entity\Character
     */
    public function getCharacter()
    {
        return $this->character;
    }
}
