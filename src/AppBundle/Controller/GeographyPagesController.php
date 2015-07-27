<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use DOMDocument;

class GeographyPagesController extends Controller
{
  /**
   * @Route("/geo", name="geography")
   */
  public function geographyAction() {
    return $this->render('AppBundle:geography:index.html.twig',array('pagetitle' => 'Geography'));    
  }
}