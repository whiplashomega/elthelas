<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Attack;
use AppBundle\Entity\User;
use AppBundle\Entity\Creature;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

//Creatures should be obtained via JSON interface
class CreatureController extends Controller {
  
  /**
   *@Route("/creature/get/{id}", name="get_creature")
   *@Security("has_role('ROLE_USER')")
   */
  public function getAction($id) {
    $creature = $this->getDoctrine()->getManager()->getRepository("AppBundle:Creature")->find($id);
    $user = $this->get('security.token_storage')->getToken()->getUser();
    if($user->getId() == $creature->getOwnedby()->getId()) {
      return new Response(json_encode($creature), Response::HTTP_OK, array('content-type' => 'application/json'));      
    } else {
      return new Response("Access Denied", Response::HTTP_FORBIDDEN);
    }
  }
  
  /**
   *@Route("/creature/all", name="get_creatures")
   *@Security("has_role('ROLE_USER')")
   */
  public function getAllAction() {
    $user = $this->get('security.token_storage')->getToken()->getUser();
      $creatures = $user->getCreatures();
      $creaturearray = [];
      foreach($creatures as $creature) {
        $creaturearray[] = $creature;
      }
      return new Response(json_encode($creaturearray), Response::HTTP_OK, array('content-type' => 'application/json'));
  }
  
  /**
   *@Route("/creature/update/{id}", name="update_creature")
   */
  public function updateAction($id, Request $request) {
    $em = $this->getDoctrine()->getManager();
    $currentuser = $this->get('security.token_storage')->getToken()->getUser();
    $creature = $this->getDoctrine()->getManager()->getRepository("AppBundle:Creature")->find($id);
    if($currentuser->getId() == $creature->getOwnedby()->getId()) {
    $params = array();
    $content = $request->getContent();
    if (!empty($content))
    {
        $params = json_decode($content, true); // 2nd param to get as array
    }
      foreach($params as $param => $value) {
        if($param != "id" && $param != "attacks" && $param != "ownedby") {
          $creature->__set($param, $value);
        }
      }
      $attacks = $params["attacks"];
      $creattacks = $creature->getAttacks();
      $attacknum = count($creattacks);
      $newcount;
      
      for ($x = 0; $x < count($attacks); $x++) {
        if($x == count($attacks)) {
          break;
        }
        if($x < $attacknum) {
          $creattacks[$x]->setName($attacks[$x]["attack"])->setBonus($attacks[$x]["bonus"])->setDamage($attacks[$x]["damage"]);
        } else {
          //if we have more attacks than we did before, we need to add new attacks
          $creattacks[] = new Attack();
          $creattacks[$x]->setName($attacks[$x]["attack"])->setBonus($attacks[$x]["bonus"])->setDamage($attacks[$x]["damage"])->setCreature($creature);
        }
        $em->persist($creattacks[$x]);
        $newcount = $x;
      }
      $em->persist($creature);
      $em->flush();
      //$params["creattacks"] = $creattacks;
      $printparams = print_r($params, true);
      return new Response($printparams, Response::HTTP_OK);
    } else {
      return new Response("Access Denied", Response::HTTP_FORBIDDEN);
    }
  }
  /**
   *@Route("/creature/delete/{id}", name="delete_creature")
   */
  public function deleteAction($id) {
    $currentuser = $this->get('security.token_storage')->getToken()->getUser();
    $em = $this->getDoctrine()->getManager();
    $creature = $em->getRepository("AppBundle:Creature")->find($id);
    if($currentuser->getId() == $creature->getOwnedby()->getId()) {
      $usercreatures = $currentuser->getCreatures();
      $usercreatures->removeElement($creature);
      $em->remove($creature);
      $em->flush();
      return new Response("1", Response::HTTP_OK);
    } else {
      return new Response("Access Denied", Response::HTTP_FORBIDDEN);
    }
  }
  /**
   *@Route("/creature/add", name="add_creature")
   */
  public function addAction(Request $request) {
    $currentuser = $this->get('security.token_storage')->getToken()->getUser();
    $securityContext = $this->container->get('security.context');
    if($securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
      $em = $this->getDoctrine()->getManager();
      $creature = new Creature();
      $creature->setName("new creature");
      $creature->setOwnedby($currentuser);
      $currentuser->addCreature($creature);
      $em->persist($currentuser);
      $em->persist($creature);
      $em->flush();
      return new Response(json_encode($creature));
    } else {
      return new Response("Access Denied", Response::HTTP_FORBIDDEN);
    }
  }
}
