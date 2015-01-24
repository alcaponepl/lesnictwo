<?php

namespace Lesnictwo\MapaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MapaController extends Controller
{
    public function indexAction()
    {
        return $this->render('LesnictwoMapaBundle:Mapa:index.html.twig');
    }
}
