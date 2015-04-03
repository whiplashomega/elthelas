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
     *ORM\Column(type="string", length=100)
     */
    protected $date;
    
    /**
     *ORM\Column(type="text")
     */
    protected $text;
    
    /**
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
     *Get date
     *
     *@return string
     */
    public function getDate() {
      return $this->date;
    }
    /**
     *Set date
     *
     *@param \string $date
     *@return Journal
     */
    public function setDate(\string $date) {
      $this->date = $date;
      return $this;
    }
    /**
     *Get text
     *
     *@return \string $text
     */
    public function getText() {
      return $this->text;
    }
    /**
     *Set text
     *
     *@param \string $text
     *@return Journal
     */
    public function setText(\string $text) {
      $this->text = $text;
      return $this;
    }

}
