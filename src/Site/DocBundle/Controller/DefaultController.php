<?php

namespace Site\DocBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('DocBundle:Default:index.html.twig');
    }

    public function gedmoAction()
    {
        return $this->render('DocBundle:Default:gedmo.html.twig');
    }
}
