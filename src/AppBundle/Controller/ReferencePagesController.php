<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use DOMDocument;

class ReferencePagesController extends Controller
{
  /**
   * @Route("/ref", name="ref_manual")
   */
  public function refHomeAction()
  {
        return $this->render('AppBundle:ref:index.html.twig', array('pagetitle' => 'Reference Manual'));    
  }
  /**
   * @Route("/ref/calendar", name="calendar")
   */
  public function refCalendarAction()
  {
    return $this->render('AppBundle:ref:calendar.html.twig', array('pagetitle' => 'Calendar'));
  }
  /**
   *@Route("/ref/cosmology", name="cosmology")
   */
  public function refCosmologyAction()
  {
    return $this->render('AppBundle:ref:cosmology.html.twig', array('pagetitle' => 'Cosmology'));
  }
  
  private function loadGodList($xmlDoc) {
			$godsXML = $xmlDoc->getElementsByTagName('god');
			$godnames = array();
			foreach($godsXML as $godXML)
      {
				$name = $godXML->getElementsByTagName('name')->item(0)->textContent;
				$godnames[$godXML->getAttribute('id')] = $name;
			}
      return $godnames;
  }
  /**
   *@Route("/ref/gods", name="show_god")
   */
  public function refGodsAction(Request $request)
  {
    if(null !== $request->get("god"))
    {
      return $this->redirectToRoute('display_god', array("god" => $request->get("god")));
    }
    $xmlDoc = new DOMDocument;
		$xmlDoc->load("gods.xml");
    $loadedgod = null;
		if($xmlDoc->validate())
    {
      $godnames = $this->loadGodList($xmlDoc);
    }

    return $this->render('AppBundle:ref:gods.html.twig', array('pagetitle' => 'Gods',
                                                     'godnames' => $godnames));
  }
  /**
   *@Route("/ref/gods/{god}", name="display_god")
   */
  public function refGodAction($god, Request $request)
  {
    if($god !== $request->get("god"))
    {
      return $this->redirectToRoute('display god', array("god" => $request->get("god")));
    }
    $xmlDoc = new DOMDocument;
		$xmlDoc->load("gods.xml");
    $loadedgod = null;
		if($xmlDoc->validate())
    {
		  $godnames = $this->loadGodList($xmlDoc);
      if ($god != '')
      {
      $loadedgod = array();
			$godXML = $xmlDoc->getElementById($god);
      if($godXML == null) {
        throw $this->createNotFoundException('The selected God does not exist');
      }
			$loadedgod['name'] = $godXML->getElementsByTagName('name')->item(0)->textContent;
			$loadedgod['symbol'] = $godXML->getElementsByTagName('holysymbol')->item(0)->textContent;
			$loadedgod['alignment'] = $godXML->getElementsByTagName('alignment')->item(0)->textContent;
			$loadedgod['domains'] = $godXML->getElementsByTagName('domains')->item(0)->textContent;
			$loadedgod['domains5'] = $godXML->getElementsByTagName('domains5')->item(0)->textContent;
			$loadedgod['interfaith'] = $godXML->getElementsByTagName('interfaithblessing')->item(0)->textContent;
			$loadedgod['worshippers'] = $godXML->getElementsByTagName('worshippers')->item(0)->textContent;
			$loadedgod['alignments'] = $godXML->getElementsByTagName('allowedalignments')->item(0)->textContent;
			$loadedgod['weapon'] = $godXML->getElementsByTagName('weapon')->item(0)->textContent;
			$loadedgod['appearance'] = $godXML->getElementsByTagName('appearance')->item(0)->textContent;
			$loadedgod['dogma'] = $godXML->getElementsByTagName('dogma')->item(0)->textContent;
			$loadedgod['clergy'] = $godXML->getElementsByTagName('clergy')->item(0)->textContent;
      }
    }

    return $this->render('AppBundle:ref:gods.html.twig', array('pagetitle' => 'Gods',
                                                     'godnames' => $godnames,
                                                     'god' => $loadedgod ));
  }
  /**
   *@Route("/ref/divines", name="ref_divines")
   */
  public function divinesAction() {
    return $this->render('AppBundle:ref:divines.html.twig',array('pagetitle' => 'Divines'));
  }
  /**
   *@Route("/ref/domains", name="ref_domains")
   */
  public function domainsActions() {
    return $this->render('AppBundle:ref:domains.html.twig',array('pagetitle' => 'Domains'));
  }
  
  /**
   *@Route("/ref/races", name="ref_races")
   */
  public function racesAction(Request $request) {
    return $this->render('AppBundle:ref:races.html.twig',array('pagetitle' => 'Races'));
  }
  /**
   *@Route("/ref/classes", name="ref_classes")
   */
  public function classesAction(Request $request) {
    return $this->render('AppBundle:ref:classes.html.twig',array('pagetitle' => 'Classes'));
  }
  /**
   *@Route("/ref/astronomy", name="astronomy")
   */
  public function astronomyAction(Request $request) {
    return $this->render('AppBundle:ref:astronomy.html.twig',array('pagetitle' => 'Astronomy'));
  }
    /**
   *@Route("/ref/lang", name="ref_lang")
   */
  public function languagesAction(Request $request) {
    return $this->render('AppBundle:ref:astronomy.html.twig',array('pagetitle' => 'Astronomy'));
  }
}