<?php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use JsonSerializable;

  /**
   *@ORM\Entity
   *@ORM\Table(name="possession")
   */
class Possession {
  
  /**
    *@ORM\Column(type="integer")
    *@ORM\Id
    *@ORM\GeneratedValue(strategy="AUTO")
    */
  protected $id;
  
  /**
   *@ORM\Column(type="string")
   */
  protected $name;
  
  /**
   *@ORM\Column(type="integer")
   */
  protected $weight;
  
  /**
   *@ORM\Column(type="string")
   */
  protected $value;
  
  /**
   *@ORM\Column(type="boolean")
   */
  protected $onperson;
  
  /**
   *@ORM\ManyToOne(targetEntity="Character", inversedBy="possessions")
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
     * Set name
     *
     * @param string $name
     *
     * @return Possession
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
     * Set weight
     *
     * @param integer $weight
     *
     * @return Possession
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Get weight
     *
     * @return integer
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set value
     *
     * @param string $value
     *
     * @return Possession
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set onperson
     *
     * @param boolean $onperson
     *
     * @return Possession
     */
    public function setOnperson($onperson)
    {
        $this->onperson = $onperson;

        return $this;
    }

    /**
     * Get onperson
     *
     * @return boolean
     */
    public function getOnperson()
    {
        return $this->onperson;
    }

    /**
     * Set character
     *
     * @param \AppBundle\Entity\Character $character
     *
     * @return Possession
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
