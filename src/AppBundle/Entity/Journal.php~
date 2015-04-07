<?php

  namespace AppBundle\Entity;
  use Doctrine\ORM\Mapping as ORM;
  
  /**
   *@ORM\Entity
   *@ORM\Table(name="journal")
   */
  class Journal {
  
    /**
     *@ORM\Column(type="integer")
     *@ORM\Id
     *@ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     *@ORM\Column(type="string", length=100)
     */
    protected $date;
    
    /**
     *@ORM\Column(type="text")
     */
    protected $text;
    
    /**
     *@ORM\ManyToOne(targetEntity="User", inversedBy="journals")
     *@ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $thisuser;
  



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
     * Set date
     *
     * @param string $date
     * @return Journal
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return string 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set text
     *
     * @param string $text
     * @return Journal
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string 
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set thisuser
     *
     * @param \AppBundle\Entity\User $thisuser
     * @return Journal
     */
    public function setThisuser(\AppBundle\Entity\User $thisuser = null)
    {
        $this->thisuser = $thisuser;

        return $this;
    }

    /**
     * Get thisuser
     *
     * @return \AppBundle\Entity\User 
     */
    public function getThisuser()
    {
        return $this->thisuser;
    }
}
