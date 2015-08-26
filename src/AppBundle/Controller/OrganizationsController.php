<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use DOMDocument;

class OrganizationsController extends Controller
{
  /**
   * @Route("/orgs", name="organizations")
   */
  public function organizationsAction() {
    return $this->render('AppBundle:organizations:index.html.twig',array('pagetitle' => 'Organizations'));    
  }
  /**
   * @Route("/orgs/{org}", name="org")
  */
  public function orgAction($type, $location, Request $request) {
    return $this->render('AppBundle:organizations:index.html.twig',array('pagetitle' => 'Organizations', 'org' => $org));     
  }
}