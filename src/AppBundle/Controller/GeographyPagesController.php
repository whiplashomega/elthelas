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
  /**
   * @Route("/geo/{type}/{location}", name="location")
  */
  public function locationAction($type, $location, Request $request) {
    return $this->render('AppBundle:geography:index.html.twig',array('pagetitle' => 'Geography', 'type' => $type, 'location' => $location ));     
  }
  /**
   * @Route("/world/{type}/{location}", name="locdata")
   */
  public function locdataAction($type, $location, Request $request) {
    
    return $this->render('AppBundle:geography:'.$type.':'.$location.'.html.twig');
  }
}