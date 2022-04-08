<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class Game extends AbstractController
{
    private $lister = [];

    /**
     * @Route("/game/card", name="documentation")
     */
    public function Card(): Response
    {
        return $this->render('game/documentation.html.twig');
    }
}
