<?php

namespace Lesnictwo\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MenuController extends Controller
{
    public function indexAction()
    {
        return $this->render('LesnictwoMainBundle:Menu:index.html.twig');
    }
}
