<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Journal;
use AppBundle\Entity\User;
use Symfony\Component\HttpFoundation\Response;

class JournalController extends Controller {
  /*
   * All calls to add, update, and retreive journal entries should be AJAX calls, as such all of the actions here
   * return json encoded responses.
   */
  
  /**
   * @Route("/getjournals/{userid}", name="get_journals")
   */
  public function getJournalsAction($userid) {
    $securityContext = $this->container->get('security.context');
    if($securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
      $user = $this->getDoctrine()->getRepository('AppBundle:User')->find($userid);
      $journals = $user->getJournals();
      $responsedata = [];
      for($x = 0; $x < $journals->count(); $x++) {
        $responsedata[] = array("id" => $journals[$x]->getID(), "date" => $journals[$x]->getDate(), "text" => $journals[$x]->getText());
      }
      $response = new Response(json_encode($responsedata), Response::HTTP_OK, array('content-type' => 'application/json'));
      return $response;
    } else {
       return new Response("Access Denied", Response::HTTP_FORBIDDEN);     
    }
  }
  
  /**
   * @Route("/addjournal/{userid}", name="add_journal")
   */
  public function addJournalAction($userid, Request $request) {
    $securityContext = $this->container->get('security.context');
    if($securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
      $em = $this->getDoctrine()->getManager();
      $user = $em->getRepository('AppBundle:User')->find($userid);
      if (!$user) {
        return new Response("No user found");
      } else {
        $journal = new Journal();
        $journal->setDate($request->get("date"))->setText($request->get("text"))->setThisuser($user);
        $user->addJournal($journal);
        $em->persist($user);
        $em->persist($journal);
        $em->flush();
        return new Response("1");
      }
    } else {
       return new Response("Access Denied", Response::HTTP_FORBIDDEN);     
    }
  }
  /**
   *@Route("/updatejournal/{journalid}", name="update_journal")
   */
  public function updateJournalAction($journalid, Request $request) {
    $em = $this->getDoctrine()->getManager();
    $journal = $em->getRepository('AppBundle:Journal')->find($journalid);
    $journal->setDate($request->get("date"))->setText($request->get("text"));
    $em->persist($journal);
    $em->flush();
    return new Response("1");
  }
  
  /**
   *@Route("/deletejournal/{userid}/{journalid}", name="delete_journal")
   */
  public function deleteJournalAction($userid, $journalid, Request $request) {
    $em = $this->getDoctrine()->getManager();
    $user = $em->getRepository('AppBundle:User')->find($userid);
    $journal = $em->getRepository('AppBundle:Journal')->find($journalid);
    $userjournals = $user->getJournals();
    $userjournals->removeElement($journal);
    $em->remove($journal);
    $em->flush();
    return new Response("1");
  }
}

?>