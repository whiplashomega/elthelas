<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class HistoryPagesController extends Controller
{
  /**
   *@Route("ref/history", name="history_index")
   */
  public function indexAction() {
    return $this->render("AppBundle:ref:history:index.html.twig");
  }
  
  /**
   *@Route("ref/history/current", name="history_current")
   */
  public function currentEventsAction() {
    return $this->render("AppBundle:ref:history:current.html.twig");
  }
}