<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class Cards extends AbstractController
{
    private $lister = [];

    /**
     * @Route("/card", name="card")
     */
    public function Card(): Response
    {
        return $this->render('cards/card.html.twig');
    }


    /**
     * @Route("/card/deck", name="deck")
     */
    public function Deck(): Response
    {
        $hand = new \App\Card\Hand();
        $value = $hand->show();

        $data = [
        'hand' => $value
    ];

        return $this->render('cards/cardgame.html.twig', $data);
    }

    /**
     * @Route("/card/deck/shuffle", name="shuffle")
     */
    public function Shuffle(): Response
    {
        $hand = new \App\Card\Hand();

        $i = 1;
        while ($i <= 52) {
            $hand->roll(new \App\Card\CardGraphic());
            $i = $i + 1;
        }

        $data = [
            'hand' => $hand->getAsString()
        ];

        return $this->render('cards/cardgame.html.twig', $data);
    }

    /**
     * @Route(
     *      "/card/deck/draw",
     *      name="draw",
     *      methods={"GET","HEAD"}
     * )
     */
    public function Draw(): Response
    {
        return $this->render('cards/pullcard.html.twig');
    }

    /**
     * @Route(
     *      "/card/deck/draw",
     *      name="draw-process",
     *      methods={"POST"}
     * )
     */
    public function process(
        Request $request,
        SessionInterface $session
    ): Response {
        $hand = $session->get("cards/cardhand") ?? new \App\Card\Hand();

        $roll  = $request->request->get('roll');
        $clear = $request->request->get('clear');

        if ($roll) {
            $hand->add(new \App\Card\CardGraphic());

            $session->set("cardhand", $hand);
            global $counter;
            $counter = 52 - $hand->getNumberDices();

            $data = [
                'amount' => $counter,
                'hand' => $hand
            ];
            return $this->render('cards/pullcards.html.twig', $data);
        } elseif ($clear) {
            $hand = new \App\Card\Hand();
            $session->set("cardhand", $hand);

            return $this->redirectToRoute('draw');
        }
    }

    /**
     * @Route(
     *      "/card/deck/draw/:number",
     *      name="number",
     *      methods={"HEAD", "GET"}
     * )
     */
    public function Number(): Response
    {
        return $this->render('cards/empty.html.twig');
    }

    /**
     * @Route(
     *      "/card/deck/draw/{number}",
     *      name="number-processer",
     *      methods={"GET"}
     * )
     */
    public function processer(
        Request $request,
        SessionInterface $session,
        $number = 1
    ): Response {
        $hand = $session->get("cards/cardhand") ?? new \App\Card\Hand();

        $hand->sethand($number);

        $session->set("cardhand", $hand);
        global $counter;
        $counter = 52 - $hand->getNumberDices();

        $data = [
            'amount' => $counter,
            'hand' => $hand
        ];
        return $this->render('cards/number.html.twig', $data);
    }


    /**
     * @Route(
     *      "/card/deck/deal/:players/:cards",
     *      name="player",
     *      methods={"HEAD", "GET"}
     * )
     */
    public function Players(): Response
    {
        return $this->render('cards/empty.html.twig');
    }

    /**
     * @Route(
     *      "/card/deck/deal/{players}/{cards}",
     *      name="player-processor",
     *      methods={"GET"}
     * )
     */
    public function processor(
        Request $request,
        SessionInterface $session,
        $players = 2,
        $cards = 5
    ): Response {
        if (($cards * $players) > 52) {
            return $this->render('cards/empty.html.twig');
        } else {
            $game = new \App\Card\Game();

            $gamer = $game->starthands($players, $cards);

            global $counter;

            $data = [
                'amount' => $counter,
                'hand' => $gamer
            ];
            return $this->render('cards/game.html.twig', $data);
        }
    }

    /**
     * @Route("/card/deck2", name="deck2")
     */
    public function Deck2(): Response
    {
        $hand = new \App\Card\Hand();
        $value = $hand->showJoker();

        $data = [
            'hand' => $value
        ];

        return $this->render('cards/cardgame.html.twig', $data);
    }
}
