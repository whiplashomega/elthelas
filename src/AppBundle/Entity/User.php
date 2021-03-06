<?php
// src/Acme/UserBundle/Entity/User.php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="Journal", mappedBy="thisuser")
     */
    protected $journals;

    /**
     * @ORM\OneToMany(targetEntity="Creature", mappedBy="ownedby")
     */
    protected $creatures;
    
    public function __construct()
    {
        parent::__construct();
        // your own logic
        $this->journals = new ArrayCollection();
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
     * Add journals
     *
     * @param \AppBundle\Entity\Journal $journals
     * @return User
     */
    public function addJournal(\AppBundle\Entity\Journal $journals)
    {
        $this->journals[] = $journals;

        return $this;
    }

    /**
     * Remove journals
     *
     * @param \AppBundle\Entity\Journal $journals
     */
    public function removeJournal(\AppBundle\Entity\Journal $journals)
    {
        $this->journals->removeElement($journals);
    }

    /**
     * Get journals
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getJournals()
    {
        return $this->journals;
    }

    /**
     * Add creatures
     *
     * @param \AppBundle\Entity\Creature $creatures
     * @return User
     */
    public function addCreature(\AppBundle\Entity\Creature $creatures)
    {
        $this->creatures[] = $creatures;

        return $this;
    }

    /**
     * Remove creatures
     *
     * @param \AppBundle\Entity\Creature $creatures
     */
    public function removeCreature(\AppBundle\Entity\Creature $creatures)
    {
        $this->creatures->removeElement($creatures);
    }

    /**
     * Get creatures
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCreatures()
    {
        return $this->creatures;
    }
}
