<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class HistoryPagesController extends Controller
{
  /**
   *@Route("history", name="history_index")
   */
  public function indexAction() {
    return $this->render("AppBundle:history:index.html.twig", array('pagetitle' => 'History'));
  }
  
  /**
   *@Route("history/current", name="history_current")
   */
  public function currentEventsAction() {
    return $this->render("AppBundle:history:current.html.twig", array('pagetitle' => 'Current Events'));
  }
  
  /**
   *@Route("history/timeline", name="history_timeline")
   */
  public function timelineAction() {
    return $this->render("AppBundle:history:timeline.html.twig", array('pagetitle' => 'Historical Timeline'));
  }
  /**
   *@Route("history/major", name="history_major")
   */
  public function majorAction() {
    return $this->render("AppBundle:history:major.html.twig", array('pagetitle' => 'Major History'));
  }
  /**
   *@Route("history/fallofdera", name="history_fall_of_dera")
   */
  public function derafallAction() {
    return $this->render("AppBundle:history:fallofdera.html.twig", array('pagetitle' => 'Fall of Dera'));
  }
  /**
   *@Route("history/godswar", name="history_gods_war")
   */
  public function godswarAction() {
    return $this->render("AppBundle:history:godswar.html.twig", array('pagetitle' => 'God\'s War'));
  }
  /**
   *@Route("history/imperialschism", name="history_imperial_schism")
   */
  public function imperialschismAction() {
    return $this->render("AppBundle:history:imperialschism.html.twig", array('pagetitle' => 'Imperial Schism'));
  }
  /**
   *@Route("history/mithrilwars", name="history_mithril_wars")
   */
  public function mithrilwarsAction(){
    return $this->render("AppBundle:history:mithrilwars.html.twig", array('pagetitle' => 'Mithril Wars'));
  }
  /**
   *@Route("history/moonelfrebellion", name="history_moon_elf_rebellion")
   */
  public function moonelfrebellionAction(){
    return $this->render("AppBundle:history:moonelfrebellion.html.twig", array('pagetitle' => 'Moon Elf Rebellion'));
  }
  /**
   *@Route("history/nerimcataclysm", name="history_nerim_cataclysm")
   */
  public function nerimcataclysmAction(){
    return $this->render("AppBundle:history:nerimcataclysm.html.twig", array('pagetitle' => 'Nerim Cataclysm'));
  }
  /**
   *@Route("history/unificationwars", name="history_unification_wars")
   */
  public function unificationwarsAction(){
    return $this->render("AppBundle:history:unificationwars.html.twig", array('pagetitle' => 'Unification Wars'));
  }
}