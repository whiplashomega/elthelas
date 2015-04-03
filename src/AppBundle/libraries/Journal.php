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
     *@ORM\Column(type="intenger")
     */
    protected $campaign;
  
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
     * Set campaign
     *
     * @param \intenger $campaign
     * @return Journal
     */
    public function setCampaign(\intenger $campaign)
    {
        $this->campaign = $campaign;

        return $this;
    }

    /**
     * Get campaign
     *
     * @return \intenger 
     */
    public function getCampaign()
    {
        return $this->campaign;
    }
}
