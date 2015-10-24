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
    $dir = "/spells";
    $spells = scandir($dir);
    unset($spells[1]);
    unset($spells[0]);
    $spellarray = array();
    foreach($spells as $spell) {
      $spelldesc = file($dir . '/' . $spell );
      $spelltitle = str_replace("\"","",substr($spelldesc[2],strpos($spelldesc[2],"\"")));
      $spelltags = str_replace("tags:","",$spelldesc[4]);
      $spellentry = implode($spelldesc);
      
      $spellarray[] = array($spelltitle, $spelltags, $spellentry);
    }
    return $this->render('AppBundle:dm:index.html.twig', array('pagetitle' => 'Dungeon Master\'s Toolset', 'spells' => json_encode($spellarray)));
  }
}