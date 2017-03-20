<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Attack;
use AppBundle\Entity\Spell;
use AppBundle\Entity\Possession;
use AppBundle\Entity\User;
use AppBundle\Entity\DDCharacter;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

//Creatures should be obtained via JSON interface
class CharacterController extends Controller {
  
  /**
   *@Route("/character/get/{id}", name="get_character")
   *@Security("has_role('ROLE_USER')")
   */
  public function getAction($id) {
    $character = $this->getDoctrine()->getManager()->getRepository("AppBundle:DDCharacter")->find($id);
    $user = $this->get('security.token_storage')->getToken()->getUser();
    if($user->getId() == $character->getOwnedby()->getId()) {
      return new Response(json_encode($character), Response::HTTP_OK, array('content-type' => 'application/json'));      
    } else {
      return new Response("Access Denied", Response::HTTP_FORBIDDEN);
    }
  }
  
  /**
   *@Route("/character/all", name="get_characters")
   *@Security("has_role('ROLE_USER')")
   */
  public function getAllAction() {
    $user = $this->get('security.token_storage')->getToken()->getUser();
      $characters = $user->getDdcharacters();
      $characterarray = [];
      foreach($characters as $character) {
        $characterarray[] = $character;
      }
      return new Response(json_encode($characterarray), Response::HTTP_OK, array('content-type' => 'application/json'));
  }
  
  /**
   *@Route("/character/update/{id}", name="update_character")
   */
  public function updateAction($id, Request $request) {
    $em = $this->getDoctrine()->getManager();
    $currentuser = $this->get('security.token_storage')->getToken()->getUser();
    $character = $this->getDoctrine()->getManager()->getRepository("AppBundle:DDCharacter")->find($id);
    if(!$character) {
      return $this->addAction($request);
    }
    if($currentuser->getId() == $character->getOwnedby()->getId()) {
      $content = $request->getContent();
      $params = $this->saveCharacter($content, $character, $em);
      $printparams = print_r($params, true);
      return new Response($printparams, Response::HTTP_OK);
    } else {
      return new Response("Access Denied", Response::HTTP_FORBIDDEN);
    }
  }
  /**
   *@Route("/character/delete/{id}", name="delete_character")
   */
  public function deleteAction($id) {
    $currentuser = $this->get('security.token_storage')->getToken()->getUser();
    $em = $this->getDoctrine()->getManager();
    $character = $em->getRepository("AppBundle:DDCharacter")->find($id);
    if($currentuser->getId() == $character->getOwnedby()->getId()) {
      $usercharacters = $currentuser->getDdcharacters();
      $usercharacters->removeElement($character);
      $attacks = $character->getAttacks();
      for($x = 0; $x < count($attacks); $x++) {
          $em->remove($attacks[$x]);
      }
      $spells = $character->getSpells();
      for($x = 0; $x < count($spells); $x++) {
          $em->remove($spells[$x]);
      }
      $possessions = $character->getPossessions();
      for($x = 0; $x < count($possessions); $x++) {
          $em->remove($possessions[$x]);
      }
      $em->remove($character);
      $em->flush();
      return new Response("1", Response::HTTP_OK);
    } else {
      return new Response("Access Denied", Response::HTTP_FORBIDDEN);
    }
  }
  /**
   *@Route("/character/add", name="add_character")
   */
  public function addAction(Request $request) {
    $currentuser = $this->get('security.token_storage')->getToken()->getUser();
    $securityContext = $this->container->get('security.authorization_checker');
    if($securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
      $em = $this->getDoctrine()->getManager();
      $character = new DDCharacter();
      $character->setOwnedby($currentuser);
      $currentuser->addDdcharacter($character);
      $content = $request->getContent();
      $params = $this->saveCharacter($content, $character, $em);
      $printparams = print_r($params, true);
      return new Response($printparams, Response::HTTP_OK);
    } else {
      return new Response("Access Denied", Response::HTTP_FORBIDDEN);
    }
  }
  
  private function saveCharacter($content, $character, $em) {
    $params = array();
    if (!empty($content))
    {
        $params = json_decode($content, true); // 2nd param to get as array
    }
      foreach($params as $param => $value) {
        if($param != "id" && $param != "attacks" && $param != "ownedby" && $param != "spells" && $param != "possessions") {
          $character->__set($param, $value);
        }
      }
      $attacks = $params["attacks"];
      $spells = $params["spells"];
      $possessions = $params["possessions"];
      $charattacks = $character->getAttacks();
      $charspells = $character->getSpells();
      $charpossessions = $character->getPossessions();
      $attacknum = count($charattacks);
      $newcount;
      
      for ($x = 0; $x < count($attacks); $x++) {
        if(isset($attacks[$x]["id"])) {
          foreach($charattacks as $struct) {
            if ($attacks[$x]["id"] === $struct->getId()) {
              $struct->setName($attacks[$x]["name"])->setBonus($attacks[$x]["bonus"])->setDamage($attacks[$x]["damage"])->setCrit($attacks[$x]["crit"]);
              break;
            }
          }
        } else {
          $charattacks[] = new Attack();
          $y = count($charattacks)-1;
          $charattacks[$y]->setName($attacks[$x]["name"])->setBonus($attacks[$x]["bonus"])->setDamage($attacks[$x]["damage"])->setCrit($attacks[$x]["crit"])->setDdcharacter($character);
        }
        $em->persist($charattacks[$x]);
      }
      
      for ($x = 0; $x < count($spells); $x++) {
        if(isset($spells[$x]["id"])) {
          foreach($charspells as $struct) {
            if($spells[$x]["id"] === $struct->getId()) {
              $struct->setTitle($spells[$x]["title"])->setSource($spells[$x]["source"])->setSchool($spells[$x]["school"])->setLevel($spells[$x]["level"]);
              $struct->setRitual($spells[$x]["ritual"])->setCastingtime($spells[$x]["castingtime"])->setRange($spells[$x]["range"]);
              $struct->setComponents($spells[$x]["components"])->setDuration($spells[$x]["duration"])->setConcentration($spells[$x]["concentration"]);
              $struct->setDescription($spells[$x]["description"])->setHigherlevels($spells[$x]["higherlevels"])->setFromclass($spells[$x]["fromclass"]);
              $struct->setPrepared($spells[$x]["prepared"])->setCastingstat($spells[$x]["castingstat"]);
              break;
            }
          }
        } else {
          $charspells[] = new Spell();
          $y = count($charspells)-1;
          $charspells[$y]->setTitle($spells[$x]["title"])->setSource($spells[$x]["source"])->setSchool($spells[$x]["school"])->setLevel($spells[$x]["level"]);
          $charspells[$y]->setRitual($spells[$x]["ritual"])->setCastingtime($spells[$x]["castingtime"])->setRange($spells[$x]["range"]);
          $charspells[$y]->setComponents($spells[$x]["components"])->setDuration($spells[$x]["duration"])->setConcentration($spells[$x]["concentration"]);
          $charspells[$y]->setDescription($spells[$x]["description"])->setHigherlevels($spells[$x]["higherlevels"])->setFromclass($spells[$x]["fromclass"]);
          $charspells[$y]->setPrepared($spells[$x]["prepared"])->setCastingstat($spells[$x]["castingstat"])->setDdcharacter($character);
        }
        $em->persist($charspells[$x]);
      }
      
      for ($x = 0; $x < count($possessions); $x++) {
        if(isset($possessions[$x]["id"])) {
          foreach($charpossessions as $struct) {
            if($possessions[$x]["id"] === $struct->getId()) {
              $struct->setName($possessions[$x]["name"])->setWeight($possessions[$x]["weight"])->setValue($possessions[$x]["value"])->setOnperson($possessions[$x]["onperson"]);
              break;
            } 
          }
        } else {
          $charpossessions[] = new Possession();
          $y = count($charpossessions) - 1;
          $charpossessions[$y]->setName($possessions[$x]["name"])->setWeight($possessions[$x]["weight"])->setValue($possessions[$x]["value"])->setOnperson($possessions[$x]["onperson"])->setDdcharacter($character);
        }
        $em->persist($possessions[$x]);
      }
      $em->persist($character);
      $em->flush();
      return json_encode($character);
  }
}
