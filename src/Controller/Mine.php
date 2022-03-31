<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class Mine extends AbstractController
{

    /**
     * @Route("/", name="home")
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
     * @Route("/about", name="about")
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
     * @Route("/report", name="report")
     */
    public function Report(): Response
    {
        return $this->render('report.html.twig', [
            'kmom1' => 'Jag har precis tidigare avslutat kursen objektorienterad python. Jag upplever verkligen att den kursen har hjälpt med förståelsen av objektorientering överlag.
            Samt så höll vi även på med en del objektorientering i databaskursen, med ocjekt och moduler. Att kontinuerligt hålla på med sådana strukturer i kod hjälper en att förstå
            övergripande drag i struktur oavsett språk. Det ät sättet att tänla som kontinuerligt utvecklas genom att arbeta med olika sätt att jobba. Överlag tycker jag även att nästan alla
            kurser utom kanske första python kursen har varit till hjälp i denna kurs redan i kmom01. Det finns delar, moment och strukturer som man kontinuerligt känner igenom och blir
            påmind om att kunna använda. Vilket är roligt. Överlag består ett objekt i php, av en klass som kan bestå av properties, konstanter och metoder. För att skapa sin första klass behöver
            klassen innehålla någon av de tre punkterna. Utan ett innehåll och om klassen inte har några ärvda egenskaper så är klassen obrukbar då den inte har några egenskaper än existerande.
            Först upplevde jag strukturen i symfony som otorligt svår. Jag försökte leta i filerna för att veta vart jag kunde jobba, utan framgång. Men då vände jag mig till symfony.com för att 
            läsa referensmaterialen. Det underlättade hela arbetet. Efter hade jag en bredare förståelse och nu känns strukturen mer logisk. Jag fann ämnet "Interactions with Databases" som 
            extra intressant i artikeln “PHP The Right Way”. Genom att föstå den logiska delen i arbete vi gör nu i detta kursmoment. Jag hade ingen vetskap om att objektorienterad PHP, underlättar 
            arbetat markant vid testning. Tyvärr stod det inte mycket om detta än några konkreta exempel med kodstrukturer. Men jag skulle tycka det var intressant om vi kunde gå igenom mer 
            bakomliggande argument till varför val av viss struktur i kod underlätar för det generella arbetet. Om man gör så kan det leda till... Och så vidare. 
            Mitt TIL för detta kursmoment är absolut att titta mer i referensmaterial, "kolla mer i intruktionsboken".',
            'kmom2' => 'Skriv här',
            'kmom3' => 'Skriv här',
            'kmom4' => 'Skriv här',
            'kmom5' => 'Skriv här',
            'kmom6' => 'Skriv här',
            'kmom10' => 'Skriv här',
        ]);
    }
}
