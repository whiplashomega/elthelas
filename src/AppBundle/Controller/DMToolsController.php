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
    $dir = $_SERVER['DOCUMENT_ROOT']."/spells";
    $spells = scandir($dir);
    unset($spells[1]);
    unset($spells[0]);
    $spellarray = array();
    $schools = array("abjuration", "conjuration", "divination", "enchantment", "evocation", "illusion", "necromancy", "transmutation");
    $levels = array("cantrip", "level1", "level2", "level3", "level4", "level5", "level6", "level7", "level8", "level9");
    foreach($spells as $spell) {
      $spelldesc = file($dir . '/' . $spell );
      $spelltitle = str_replace("\"","",substr($spelldesc[2],strpos($spelldesc[2],"\"")));
      $spellsource = str_replace("source: ","",$spelldesc[4]);
      $spelltags = explode(", ",str_replace("]\n","",str_replace("tags: [","",$spelldesc[5])));
      $school = implode("", array_intersect($schools,$spelltags));
      $level = implode("", array_intersect($levels, $spelltags));
      if(array_intersect(array("ritual"),$spelltags)) {
        $ritual = true;
      } else {
        $ritual = false;
      }
      $castingTime = str_replace("**Casting Time**: ","",$spelldesc[10]);
      $range = str_replace("**Range**: ","",$spelldesc[12]);
      $components = str_replace("**Components**: ","",$spelldesc[14]);
      $duration = str_replace("**Duration**: ","",$spelldesc[16]);
      $description = str_replace("<p>\n</p>","",str_replace("**At Higher Levels.**","<strong>At Higher Levels.</strong>","<p>".implode("</p><p>",array_slice($spelldesc, 18))."</p>"));
      
      $spellarray[] = array(
        "title" => $spelltitle, 
        "source"=>$spellsource, 
        "tags"=>$spelltags, 
        "school"=>$school, 
        "level"=>$level,
        "ritual"=>$ritual,
        "castingTime"=>$castingTime, 
        "range"=>$range, 
        "components"=>$components,
        "duration"=>$duration,
        "description"=>$description);
    }
    return $this->render('AppBundle:dm:index.html.twig', array('pagetitle' => 'Dungeon Master\'s Toolset', 'spells' => json_encode($spellarray)));
  }
}