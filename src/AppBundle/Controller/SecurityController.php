<?php
// src/AppBundle/Controller/SecurityController.php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SecurityController extends Controller
{
  /**
   * @Route("/login", name="login_route")
   */
  public function loginAction(Request $request) {
    $authenticationUtils = $this->get('security.authentication_utils');

    // get the login error if there is one
    $error = $authenticationUtils->getLastAuthenticationError();

    // last username entered by the user
    $lastUsername = $authenticationUtils->getLastUsername();

    return $this->render(
        'security/login.html.twig',
        array(
            // last username entered by the user
            'last_username' => $lastUsername,
            'error'         => $error,
        )
    );    
  }
  /**
  * @Route("/login_check", name="login_check")
  */
  public function loginCheckAction()
  {
      // this controller will not be executed,
      // as the route is handled by the Security system
  }
  /**
   *@Route("/register", name="account_register")
   */
      public function registerAction()
    {
        $registration = new Registration();
        $form = $this->createForm(new RegistrationType(), $registration, array(
            'action' => $this->generateUrl('account_create'),
        ));

        return $this->render(
            'AppBundle:security:register.html.twig',
            array('form' => $form->createView())
        );
    }
    /**
     *@Route("/register/create", name="account_create")
     */
    public function createAction(Request $request)
{
    $em = $this->getDoctrine()->getManager();

    $form = $this->createForm(new RegistrationType(), new Registration());

    $form->handleRequest($request);

    if ($form->isValid()) {
        $registration = $form->getData();

        $em->persist($registration->getUser());
        $em->flush();

        return $this->redirectToRoute('homepage');
    }

    return $this->render(
        'AppBundle:security:register.html.twig',
        array('form' => $form->createView())
    );
  }
}
?>