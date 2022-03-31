<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class Mine extends AbstractController
{

    /**
     * @Route("/")
     */
    public function HomePage(): Response
    {

        return $this->render('me.html.twig', [
            'name' => 'Anna Berg',
            'age' => 24,
            'about' => 'Så, en presentation en bra början. Så jag skriver några rader om mig själv..
            Född och uppvuxen i Dalarna, Jag har alltid idrottat på elit nivå men efter skador fick jag lägga den karriären i en skolåda på vinden. 
            Jag har läst flera kurser inom journalistik och litteraturvetenskap, vilket jag alltid tänkt passar mig bäst. Men så blev det inte när jag väl studerat länge och kände att det ej passade mig längre. 
            Så efter flera år i olika jobb landade jag här. Idag bor jag med min sambo och hund kvar i Dalarna, nära till naturen.',
        ]);
    }


    /**
     * @Route("/about")
     */
    public function About(): Response
    {
        return $this->render('about.html.twig', [
            'kursnamn' => 'Objektorienterade webbteknologier',
            'kurskod' => 'DV1608',
            'om' => 'Denna kurs fokuserar på objektorienterad PHP i samverkan med webbaserat ramverk och enhetstesting. 
            Klassiska objektorienterade konstruktioner hanteras tillsammans med objektorienterad programmering.'
        ]);
    }



    /**
     * @Route("/report")
     */
    public function Report(): Response
    {
        return $this->render('report.html.twig', [
            'kmom1' => 'Skriv här',
            'kmom2' => 'Skriv här',
            'kmom3' => 'Skriv här',
            'kmom4' => 'Skriv här',
            'kmom5' => 'Skriv här',
            'kmom6' => 'Skriv här',
            'kmom10' => 'Skriv här',
        ]);
    }
}
