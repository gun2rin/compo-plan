<?php

namespace Compo\DepartmentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('DepartmentBundle:Default:index.html.twig');
    }
}
