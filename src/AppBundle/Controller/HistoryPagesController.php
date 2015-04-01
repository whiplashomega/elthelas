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
    return $this->render("AppBundle:history:index.html.twig");
  }
  
  /**
   *@Route("history/current", name="history_current")
   */
  public function currentEventsAction() {
    return $this->render("AppBundle:history:current.html.twig");
  }
  
  /**
   *@Route("history/timeline", name="history_timeline")
   */
  public function timelineAction() {
    return $this->render("AppBundle:history:timeline.html.twig");
  }
  /**
   *@Route("history/major", name="history_major")
   */
  public function majorAction() {
    return $this->render("AppBundle:history:major.html.twig");
  }
}