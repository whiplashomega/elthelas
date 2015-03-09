<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RacialTraits
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class RacialTraits
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
     * @var string
     *
     * @ORM\Column(name="system", type="string", length=255)
     */
    private $system;

    /**
     * @ORM\ManyToMany(targetEntity="Race", mappedBy="racialtraits")
     */
    private $races;

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
     * @return RacialTraits
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
     * @return RacialTraits
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
     * Set system
     *
     * @param string $system
     * @return RacialTraits
     */
    public function setSystem($system)
    {
        $this->system = $system;

        return $this;
    }

    /**
     * Get system
     *
     * @return string 
     */
    public function getSystem()
    {
        return $this->system;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->races = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add races
     *
     * @param \AppBundle\Entity\Race $races
     * @return RacialTraits
     */
    public function addRace(\AppBundle\Entity\Race $races)
    {
        $this->races[] = $races;

        return $this;
    }

    /**
     * Remove races
     *
     * @param \AppBundle\Entity\Race $races
     */
    public function removeRace(\AppBundle\Entity\Race $races)
    {
        $this->races->removeElement($races);
    }

    /**
     * Get races
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRaces()
    {
        return $this->races;
    }
}
