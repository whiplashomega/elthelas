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
   *@ORM\Column(type="boolean")
   */
  protected $equipped;
  
  /**
   *@ORM\Column(type="string")
   */
  protected $armortype;
  
  /**
   *@ORM\Column(type="integer")
   */
  protected $ac;
  
  /**
   *@ORM\ManyToOne(targetEntity="DDCharacter", inversedBy="possessions")
   *@ORM\JoinColumn(name="ddcharacter_id", referencedColumnName="id")
   */
  protected $ddcharacter;

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
     * Set ddcharacter
     *
     * @param \AppBundle\Entity\DDCharacter $ddcharacter
     *
     * @return Possession
     */
    public function setDdcharacter(\AppBundle\Entity\DDCharacter $ddcharacter = null)
    {
        $this->ddcharacter = $ddcharacter;

        return $this;
    }

    /**
     * Get ddcharacter
     *
     * @return \AppBundle\Entity\DDCharacter
     */
    public function getDdcharacter()
    {
        return $this->ddcharacter;
    }

    /**
     * Set equipped
     *
     * @param boolean $equipped
     *
     * @return Possession
     */
    public function setEquipped($equipped)
    {
        $this->equipped = $equipped;

        return $this;
    }

    /**
     * Get equipped
     *
     * @return boolean
     */
    public function getEquipped()
    {
        return $this->equipped;
    }

    /**
     * Set armortype
     *
     * @param string $armortype
     *
     * @return Possession
     */
    public function setArmortype($armortype)
    {
        $this->armortype = $armortype;

        return $this;
    }

    /**
     * Get armortype
     *
     * @return string
     */
    public function getArmortype()
    {
        return $this->armortype;
    }

    /**
     * Set ac
     *
     * @param integer $ac
     *
     * @return Possession
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
}
