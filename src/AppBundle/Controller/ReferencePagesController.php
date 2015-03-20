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
   * @Route("/ref")
   */
  public function refHomeAction()
  {
        return $this->render('ref/index.html.twig', array('pagetitle' => 'Reference Manual'));    
  }
  /**
   * @Route("/ref/calendar")
   */
  public function refCalendarAction()
  {
    return $this->render('ref/calendar.html.twig', array('pagetitle' => 'Calendar'));
  }
  /**
   *@Route("/ref/cosmology")
   */
  public function refCosmologyAction()
  {
    return $this->render('ref/cosmology.html.twig', array('pagetitle' => 'Cosmology'));
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
   *@Route("/ref/gods", name="show god")
   */
  public function refGodsAction(Request $request)
  {
    if(null !== $request->get("god"))
    {
      return $this->redirectToRoute('display god', array("god" => $request->get("god")));
    }
    $xmlDoc = new DOMDocument;
		$xmlDoc->load("gods.xml");
    $loadedgod = null;
		if($xmlDoc->validate())
    {
      $godnames = $this->loadGodList($xmlDoc);
    }

    return $this->render('ref/gods.html.twig', array('pagetitle' => 'Gods',
                                                     'godnames' => $godnames));
  }
  /**
   *@Route("/ref/gods/{god}", name="display god")
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

    return $this->render('ref/gods.html.twig', array('pagetitle' => 'Gods',
                                                     'godnames' => $godnames,
                                                     'god' => $loadedgod ));
  }
}