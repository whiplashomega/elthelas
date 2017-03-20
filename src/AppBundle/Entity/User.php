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
     * @ORM\OneToMany(targetEntity="DDCharacter", mappedBy="ownedby")
     */
    protected $ddcharacters;

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
     * Add ddcharacter
     *
     * @param \AppBundle\Entity\DDCharacter $ddcharacter
     *
     * @return User
     */
    public function addDdcharacter(\AppBundle\Entity\DDCharacter $ddcharacter)
    {
        $this->ddcharacters[] = $ddcharacter;

        return $this;
    }

    /**
     * Remove ddcharacter
     *
     * @param \AppBundle\Entity\DDCharacter $ddcharacter
     */
    public function removeDdcharacter(\AppBundle\Entity\DDCharacter $ddcharacter)
    {
        $this->ddcharacters->removeElement($ddcharacter);
    }

    /**
     * Get ddcharacters
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDdcharacters()
    {
        return $this->ddcharacters;
    }
}
