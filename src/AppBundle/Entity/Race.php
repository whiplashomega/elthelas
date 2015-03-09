<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Race
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Race
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity="Race", mappedBy="subraceof")
     */
    private $subraces;
    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Race", inversedBy="subraces")
     * @ORM\Column(name="subraceof", type="integer")
     */
    private $subraceof;

    /**
     * @var integer
     *
     * @ORM\Column(name="lifespan", type="integer")
     */
    private $lifespan;

    /**
     * @ORM\ManyToMany(targetEntity="Race", inversedBy="races")
     * @ORM\JoinTable(name="race_racialtraits")
     */
    private $racialtraits;
    
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
     * Set name
     *
     * @param string $name
     * @return Race
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
     * Set description
     *
     * @param string $description
     * @return Race
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
     * Set subraceof
     *
     * @param integer $subraceof
     * @return Race
     */
    public function setSubraceof($subraceof)
    {
        $this->subraceof = $subraceof;

        return $this;
    }

    /**
     * Get subraceof
     *
     * @return integer 
     */
    public function getSubraceof()
    {
        return $this->subraceof;
    }

    /**
     * Set lifespan
     *
     * @param integer $lifespan
     * @return Race
     */
    public function setLifespan($lifespan)
    {
        $this->lifespan = $lifespan;

        return $this;
    }

    /**
     * Get lifespan
     *
     * @return integer 
     */
    public function getLifespan()
    {
        return $this->lifespan;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->subraces = new \Doctrine\Common\Collections\ArrayCollection();
        $this->racialtraits = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add subraces
     *
     * @param \AppBundle\Entity\Race $subraces
     * @return Race
     */
    public function addSubrace(\AppBundle\Entity\Race $subraces)
    {
        $this->subraces[] = $subraces;

        return $this;
    }

    /**
     * Remove subraces
     *
     * @param \AppBundle\Entity\Race $subraces
     */
    public function removeSubrace(\AppBundle\Entity\Race $subraces)
    {
        $this->subraces->removeElement($subraces);
    }

    /**
     * Get subraces
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSubraces()
    {
        return $this->subraces;
    }

    /**
     * Add racialtraits
     *
     * @param \AppBundle\Entity\Race $racialtraits
     * @return Race
     */
    public function addRacialtrait(\AppBundle\Entity\Race $racialtraits)
    {
        $this->racialtraits[] = $racialtraits;

        return $this;
    }

    /**
     * Remove racialtraits
     *
     * @param \AppBundle\Entity\Race $racialtraits
     */
    public function removeRacialtrait(\AppBundle\Entity\Race $racialtraits)
    {
        $this->racialtraits->removeElement($racialtraits);
    }

    /**
     * Get racialtraits
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRacialtraits()
    {
        return $this->racialtraits;
    }
}
