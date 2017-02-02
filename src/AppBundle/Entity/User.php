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
     * @ORM\OneToMany(targetEntity="Character", mappedBy="ownedby")
     */
    protected $characters;

    /**
     * Add journal
     *
     * @param \AppBundle\Entity\Journal $journal
     *
     * @return User
     */
    public function addJournal(\AppBundle\Entity\Journal $journal)
    {
        $this->journals[] = $journal;

        return $this;
    }

    /**
     * Remove journal
     *
     * @param \AppBundle\Entity\Journal $journal
     */
    public function removeJournal(\AppBundle\Entity\Journal $journal)
    {
        $this->journals->removeElement($journal);
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
     * Add character
     *
     * @param \AppBundle\Entity\Character $character
     *
     * @return User
     */
    public function addCharacter(\AppBundle\Entity\Character $character)
    {
        $this->characters[] = $character;

        return $this;
    }

    /**
     * Remove character
     *
     * @param \AppBundle\Entity\Character $character
     */
    public function removeCharacter(\AppBundle\Entity\Character $character)
    {
        $this->characters->removeElement($character);
    }

    /**
     * Get characters
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCharacters()
    {
        return $this->characters;
    }
}
