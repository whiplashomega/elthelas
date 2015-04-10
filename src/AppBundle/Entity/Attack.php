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
class Attack  implements JsonSerializable {
  
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
   *@ORM\ManyToOne(targetEntity="Creature", inversedBy="attacks")
   *@ORM\JoinColumn(name="creature_id", referencedColumnName="id")
   */
  protected $creature;  

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
     * Set creature
     *
     * @param \AppBundle\Entity\Creature $creature
     * @return Attack
     */
    public function setCreature(\AppBundle\Entity\Creature $creature = null)
    {
        $this->creature = $creature;

        return $this;
    }

    /**
     * Get creature
     *
     * @return \AppBundle\Entity\Creature 
     */
    public function getCreature()
    {
        return $this->creature;
    }
    public function jsonSerialize() {
      $json = array();
      foreach($this as $key => $value) {
        if($key != "creature") {
          $json[$key] = $value;
        }
      }
      return $json;
    }
}
