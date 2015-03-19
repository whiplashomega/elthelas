<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class ReferencePagesController extends Controller
{
  /**
   * @Route("/ref")
   */
  public function refHomeAction() {
        return $this->render('ref/index.html.twig', array('pagetitle' => 'Reference Manual'));    
  }
}
