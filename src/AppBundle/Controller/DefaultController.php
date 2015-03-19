<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        return $this->render('default/index.html.twig');
    }
    /**
     * @Route("/about", name="about")
     */
    public function aboutAction()
    {
        return $this->render('default/about.html.twig', array('pagetitle' => 'About the Author'));
    }
    /**
     * @Route("/resume", name="resume")
     */
    public function resumeAction()
    {
        return $this->render('default/resume.html.twig', array('pagetitle' => 'Resume of Joseph Harrison'));
    }
}
