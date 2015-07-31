<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use JsonSerializable;

  /**
   *@ORM\Entity
   *@ORM\Table(name="landmark")
   */
class Landmark {
    /**
    *@ORM\Column(type="integer")
    *@ORM\Id
    *@ORM\GeneratedValue(strategy="AUTO")
    */
  protected $id;
  
  /**
   *@ORM\Column(type="string", nullable=false)
   */
  protected $name;
  
  /**
   *@ORM\Column(type="text", nullable=false)
   */
  protected $html;

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
     * @return Feature
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
     * Set html
     *
     * @param string $html
     * @return Feature
     */
    public function setHtml($html)
    {
        $this->html = $html;

        return $this;
    }

    /**
     * Get html
     *
     * @return string 
     */
    public function getHtml()
    {
        return $this->html;
    }
}
