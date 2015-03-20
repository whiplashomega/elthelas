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
        return $this->render('AppBundle:default:index.html.twig');
    }
    /**
     * @Route("/about", name="about")
     */
    public function aboutAction()
    {
        return $this->render('AppBundle:default:about.html.twig', array('pagetitle' => 'About the Author'));
    }
    /**
     * @Route("/resume", name="resume")
     */
    public function resumeAction()
    {
        return $this->render('AppBundle:default:resume.html.twig', array('pagetitle' => 'Resume of Joseph Harrison'));
    }
}
