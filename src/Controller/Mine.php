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
    public function homePage(): Response
    {
        return $this->render('me.html.twig', [
            'name' => 'Anna Berg',
            'age' => 24,
            'about' => 'Så, en presentation en bra början. Så jag skriver några rader om mig själv..
            Född och uppvuxen i Dalarna, Jag har alltid idrottat på elit nivå men efter skador fick jag lägga den
            karriären i en skolåda på vinden. 
            Jag har läst flera kurser inom journalistik och litteraturvetenskap, vilket jag alltid tänkt passar 
            mig bäst. Men så blev det inte när jag väl studerat länge och kände att det ej passade mig längre. 
            Så efter flera år i olika jobb landade jag här. Idag bor jag med min sambo och hund kvar i Dalarna, 
            nära till naturen.',
        ]);
    }


    /**
     * @Route("/about", name="about")
     */
    public function about(): Response
    {
        return $this->render('about.html.twig', [
            'kursnamn' => 'Objektorienterade webbteknologier',
            'kurskod' => 'DV1608',
            'om' => 'Denna kurs fokuserar på objektorienterad PHP i samverkan med webbaserat ramverk och enhetstesting. 
            Klassiska objektorienterade konstruktioner hanteras tillsammans med objektorienterad programmering.'
        ]);
    }

    /**
     * @Route("/metrics", name="metrics")
     */
    public function data(): Response
    {
        $data = [
            'metrics' => "Metrics"
        ];
        // print_r($products);
        return $this->render('data.html.twig', $data);
    }



    /**
     * @Route("/report", name="report")
     */
    public function report(): Response
    {
        return $this->render('report.html.twig', [
            'kmom1' => 'Jag har precis tidigare avslutat kursen objektorienterad python. Jag upplever 
            verkligen att den kursen har 
            hjälpt med förståelsen av objektorientering överlag.
            Samt så höll vi även på med en del objektorientering i databaskursen, med ocjekt och moduler.
            Att kontinuerligt hålla 
            på med sådana strukturer i kod hjälper en att förstå
            övergripande drag i struktur oavsett språk. Det ät sättet att tänla som kontinuerligt utvecklas
            genom att arbeta med 
            olika sätt att jobba. Överlag tycker jag även att nästan alla
            kurser utom kanske första python kursen har varit till hjälp i denna kurs redan i kmom01. 
            Det finns delar, moment och 
            strukturer som man kontinuerligt känner igenom och blir
            påmind om att kunna använda. Vilket är roligt. Överlag består ett objekt i php, av en klass
            som kan bestå av properties, 
            konstanter och metoder. För att skapa sin första klass behöver
            klassen innehålla någon av de tre punkterna. Utan ett innehåll och om klassen inte har några
            ärvda egenskaper så är klassen
            obrukbar då den inte har några egenskaper än existerande.
            Först upplevde jag strukturen i symfony som otorligt svår. Jag försökte leta i filerna för 
            att veta vart jag kunde jobba, 
            utan framgång. Men då vände jag mig till symfony.com för att 
            läsa referensmaterialen. Det underlättade hela arbetet. Efter hade jag en bredare förståelse
            och nu känns strukturen mer 
            logisk. Jag fann ämnet "Interactions with Databases" som 
            extra intressant i artikeln “PHP The Right Way”. Genom att föstå den logiska delen i arbete 
            vi gör nu i detta kursmoment. 
            Jag hade ingen vetskap om att objektorienterad PHP, underlättar 
            arbetat markant vid testning. Tyvärr stod det inte mycket om detta än några konkreta exempel
            med kodstrukturer. 
            Men jag skulle tycka det var intressant om vi kunde gå igenom mer 
            bakomliggande argument till varför val av viss struktur i kod underlätar för det generella arbetet. 
            Om man gör så kan det leda till... Och så vidare. 
            Mitt TIL för detta kursmoment är absolut att titta mer i referensmaterial, 
            "kolla mer i intruktionsboken".',
            'kmom2' => 'Arv är ett sätt att arbeta med ett beroende av en klass, en förälderklass 
            till en barnklass. Genom arv kan 
            barnet ärva properties och metoder. Dessa kan sedan utnyttjas eller ändras i barnklassen till
            att kunna utnyttjas på annat sätt. Detta används ofta för att utnyttja funktionaliteten 
            av metoder och värden för att 
            bredda funktionaliteten, eller specificera funktionaliteten.
            Komposition beskriver en stark koppling mellan klasser vid arv. Vid komposition är 
            barnklassen beroende av föräldraklassen 
            och kan inte existera utan föräldraklassen. Trait är likt arv men fungerar
            på ett annat sätt. Istället för att ha ett bestämt beroende av flera klasser, vilket php 
            inte kan ha, så kan man 
            använda trait för att lösa ett multiberoende. För att förklara interface lättast skulle 
            jag beskriva
            det som: relationen mellan klass och objekt är motsvarigheten mellan interface och klasser.
            Jag löste uppgiften med bilder istället för värden. Genom värdet på indexpositioner kan j
            ag komma åt rätt bild 
            genom strukturen på listan av bilder, som består av kortleken. Det tog lång tid att jobba igenom
            uppgifterna den här veckan, men det var en väldigt lärorik vecka i att förstå strukturen 
            i ramverket och oophp. 
            Egentligen skulle jag vilja skapa en klass kort, som sedan alla korten är en egen klass. 
            Beroende på värdet
            av index så fångas objektet från klassen upp som består av ett unikt kort. På så vis kan poängen 
            lättare kommas åt, 
            men jag fann inte tid för att implementera der denna vecka.
            Istället fångades korten upp i en lista likt dice. 
            Jag tyckte att det var bra att implementera ett flöderdiagram för att börja med nästa veckas 
            uppgift. Det gjorde att
            en tydlig struktur redan finns och nästa veckas problemlösning redan har tagit tre steg än att 
            börja
            från ruta ett nästa vecka.',
            'kmom3' => 'Jag tyckte att det var kul att modellera ett kortspel utifrån arbetet från förra 
            veckan. Det tro jag 
            hjälpte mig enormt i mitt arbete denna vecka. Jag tyckte att det kändes tryggt,
            tydligt och jag hade en plan som jag kunde följa och som fungerade. Det kändes både tryggt och 
            roligt när man lyckas
            med sin plan och det visar att man har kommit långt under denna utbildning. 
            Jag utgick från min plan från förra veckan. Jag hade ett flödesdiagram jag kunde luta mig tillbaka
            på och sedan hade
            jag min pseudo kod. Jag följde nästan min plan. Jag började med att bygga upp en struktur i min
            templete, 
            en tydlig bild av vad som behövdes utifrån den dokumentation jag hade gjort. Jag insåg att jag 
            behövde strukturera 
            mina get och post och vart jag kunde tänkas behövde värden från session och vart jag behövde sätta 
            värden i session. 
            Sedan använde jag klasserna från förra veckan utöver en ny klass i controller, game och en ny klass 
            gamechecker i 
            mappen gamechecker. Denna klass behövde jag för att kunna få veta vilket poäng korten var. 
            Sedan hämtade korten för antal spelare och såg till att korten alltid var begränsade till en kortlek.
            Sedan skapade 
            jag dem tre knapparna: hit, stand och new round. Det var dem knapparna jag kunde tänka mig behövas 
            för att spelaren 
            kunde utföra spelet. Sedan byggde jag upp enligt värde på korten, sparade värden i session för att 
            kunna hämta. Hela 
            processen gick smidigt och var väldigt roligt. Jag gillar att jobba i symfony, i början tyckte jag 
            att den var svår, 
            men efter första veckan tycker jag om det. Denna TIL för denna vecka är att se till att jag jobbar 
            mer enligt planen, 
            den fungerar ofta.',
            'kmom4' => '',
        ]);
    }
}
