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
   * @Route(/getjournals/{userid}, name="get_journals")
   */
  public function getJournalsAction($userid) {
    $user = $this->getDoctrine()->getRepository('AppBundle:User')->find($id);
    $journals = $user->getJournals();
    $response = new Response(json_encode($journals), HTTP_OK, array('content-type' => 'application/json'));
    $response->
    return $response;
  }
  
  /**
   * @Route(/addjournal/{userid}, name="add_journal")
   */
  public function addJournalAction($userid, Request $request) {
    $em = $this->getDoctrine()->getManager();
    $user = $em->getRepository('AppBundle:User')->find($userid);
    if (!$user) {
      throw $this->createNotFoundException(
        'No user found for id '.$id
      );
    }
  }
  /**
   *@Route(/updatejournal/{journalid}, name="update_journal)
   */
  public function updateJournalAction($journalid, Request $request) {
    $em = $this->getDoctrine()->getManager();
    $journal = $em->getRepository('AppBundle:Journal')->find($journalid);
  }
}

?>