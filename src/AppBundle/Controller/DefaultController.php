<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

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
    /**
     * @Route("/admin", name="admin")
     */
    public function adminAction() {
        return new Response('Admin page!');
    }
    /**
     * @Route("/blog", name="blog")
     */
    public function blogAction() {
      $items = array();
      foreach (glob("blogentries/*.php") as $filename)
      {
          include $filename;
      }
      return $this->render('AppBundle:default:blog.html.twig', array('pagetitle' => 'News and Changes', 'items' => $items));
    }
    /**
     * @Route("/blog.xml", name="blogrss")
     */
    public function blogrssAction() {
      $items = array();
      return $this->render('AppBundle:default:blogrss.html.twig', array('pagetitle' => 'News and Changes', 'items' => $items));
    }
}
