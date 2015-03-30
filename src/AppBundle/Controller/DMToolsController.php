<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DMToolsController extends Controller {
  /**
   *@Route("/dm", name="dmtools")
   */
  public function indexAction(Request $request) {
    return $this->render('AppBundle:dm:index.html.twig', array('pagetitle' => 'Dungeon Master\'s Toolset'));
  }
  
  /**
   *@Route("dm/initiative", name="Initiative Roller")
   */
  public function initiativeAction(Request $request) {
    $counter = 1;
    $chars = [];
    while($request->request->get("char".$counter."name")) {
      $name = $request->request->get("char".$counter."name");
      $init = $request->request->get("char".$counter."init");
      $roll = rand(1,20) + $init;
      $char = ["id" => $counter, "name" => $name, "init" => $init, "initcalc" => $roll];
      $chars[] = $char;
      $counter++;
    }
    

    
    if (empty($chars)) {
      $chars = [["id" => 1, "name" => "", "init" => 0, "initcalc" => 0]];
    }
    
    return $this->render('AppBundle:dm:initiative.html.twig', array('pagetitle' => 'Party Initiative Roll Tool', 'chars' => $chars));
  }
}