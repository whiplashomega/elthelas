<?php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use JsonSerializable;

  /**
   *@ORM\Entity
   *@ORM\Table(name="attack")
   */
class Attack {
  
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
  protected $bonus;
  
  /**
   *@ORM\Column(type="string")
   */
  protected $damage;
  
  /**
   *@ORM\Column(type="string")
   */
  protected $crit;
  
  /**
   *@ORM\ManyToOne(targetEntity="DDCharacter", inversedBy="attacks")
   *@ORM\JoinColumn(name="character_id", referencedColumnName="id")
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
     * @return Attack
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
     * Set bonus
     *
     * @param integer $bonus
     *
     * @return Attack
     */
    public function setBonus($bonus)
    {
        $this->bonus = $bonus;

        return $this;
    }

    /**
     * Get bonus
     *
     * @return integer
     */
    public function getBonus()
    {
        return $this->bonus;
    }

    /**
     * Set damage
     *
     * @param string $damage
     *
     * @return Attack
     */
    public function setDamage($damage)
    {
        $this->damage = $damage;

        return $this;
    }

    /**
     * Get damage
     *
     * @return string
     */
    public function getDamage()
    {
        return $this->damage;
    }

    /**
     * Set ddcharacter
     *
     * @param \AppBundle\Entity\DDCharacter $ddcharacter
     *
     * @return Attack
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
     * Set crit
     *
     * @param string $crit
     *
     * @return Attack
     */
    public function setCrit($crit)
    {
        $this->crit = $crit;

        return $this;
    }

    /**
     * Get crit
     *
     * @return string
     */
    public function getCrit()
    {
        return $this->crit;
    }
}
