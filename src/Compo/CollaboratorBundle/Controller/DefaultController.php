<?php

namespace Compo\CollaboratorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CollaboratorBundle:Default:index.html.twig');
    }
}
