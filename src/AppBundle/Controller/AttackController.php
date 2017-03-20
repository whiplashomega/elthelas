<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Attack;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

/**
 * Attack controller.
 *
 * @Route("attack")
 */
class AttackController extends Controller
{
    /**
     * Lists all attack entities.
     *
     * @Route("/", name="attack_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $attacks = $em->getRepository('AppBundle:Attack')->findAll();

        return $this->render('attack/index.html.twig', array(
            'attacks' => $attacks,
        ));
    }

    /**
     * Creates a new attack entity.
     *
     * @Route("/new", name="attack_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $attack = new Attack();
        $form = $this->createForm('AppBundle\Form\AttackType', $attack);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($attack);
            $em->flush($attack);

            return $this->redirectToRoute('attack_show', array('id' => $attack->getId()));
        }

        return $this->render('attack/new.html.twig', array(
            'attack' => $attack,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a attack entity.
     *
     * @Route("/{id}", name="attack_show")
     * @Method("GET")
     */
    public function showAction(Attack $attack)
    {
        $deleteForm = $this->createDeleteForm($attack);

        return $this->render('attack/show.html.twig', array(
            'attack' => $attack,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing attack entity.
     *
     * @Route("/{id}/edit", name="attack_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Attack $attack)
    {
        $deleteForm = $this->createDeleteForm($attack);
        $editForm = $this->createForm('AppBundle\Form\AttackType', $attack);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('attack_edit', array('id' => $attack->getId()));
        }

        return $this->render('attack/edit.html.twig', array(
            'attack' => $attack,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a attack entity.
     *
     * @Route("/del/{id}", name="attack_delete")
     * @Method("POST")
     */
    public function deleteAction($id)
    {
      $currentuser = $this->get('security.token_storage')->getToken()->getUser();
      $em = $this->getDoctrine()->getManager();
      $attack = $em->getRepository("AppBundle:Attack")->find($id);
      
      if($currentuser->getId() == $attack->getDdcharacter()->getOwnedby()->getId()) {
        $characterattacks = $attack->getDdcharacter()->getAttacks();
        $characterattacks->removeElement($attack);
        $em->remove($attack);
        $em->flush();
        return new Response("1", Response::HTTP_OK);        
      } else {
        return new Response("Access Denied", Response::HTTP_FORBIDDEN);
      }
    }

    /**
     * Creates a form to delete a attack entity.
     *
     * @param Attack $attack The attack entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Attack $attack)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('attack_delete', array('id' => $attack->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
