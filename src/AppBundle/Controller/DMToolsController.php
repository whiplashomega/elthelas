<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class DMToolsController extends Controller {
  /**
   *@Route("/dm", name="dmtools")
   *@Security("has_role('ROLE_USER')")
   */
  public function indexAction(Request $request) {
    $dir = $_SERVER['DOCUMENT_ROOT']."\spells";
    $spells = scandir($dir);
    return $this->render('AppBundle:dm:index.html.twig', array('pagetitle' => 'Dungeon Master\'s Toolset', 'spells' => json_encode($spells)));
  }
}