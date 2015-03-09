<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RacesController extends Controller
{
    /**
     * @Route("/races", name="homepage")
     */
    public function indexAction()
    {
        return $this->render('races/index.html.twig');
    }
}
