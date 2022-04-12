<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

use App\Card\Card;
use App\Card\Hand;
use \App\Card\CardGraphic;
use \App\Card\Game;

class Cards extends AbstractController
{
    /**
     * @Route("/card", name="card")
     */
    public function card(): Response
    {
        return $this->render('cards/card.html.twig');
    }


    /**
     * @Route("/card/deck", name="deck")
     */
    public function deck(): Response
    {
        $hand = new Hand();
        $value = $hand->show();

        $data = [
        'hand' => $value
    ];

        return $this->render('cards/cardgame.html.twig', $data);
    }

    /**
     * @Route("/card/deck/shuffle", name="shuffle")
     */
    public function shuffle(): Response
    {
        $hand = new Hand();

        $value = $hand->show();
        shuffle($value);

        $data = [
            'hand' => $value
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
    public function draw(): Response
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
        $hand = $session->get("cards/cardhand") ?? new Hand();

        $roll  = $request->request->get('roll');
        $clear = $request->request->get('clear');

        if ($roll) {
            $hand->add(new CardGraphic());

            $session->set("cardhand", $hand);
            global $counter;
            $counter = 52 - $hand->getNumberDices();

            $data = [
                'amount' => $counter,
                'hand' => $hand
            ];
            return $this->render('cards/pullcards.html.twig', $data);
        } elseif ($clear) {
            $hand = new Hand();
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
    public function number(): Response
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
        SessionInterface $session,
        $number = 1
    ): Response {
        $hand = $session->get("cards/cardhand") ?? new Hand();

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
    public function players(): Response
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
        $players = 2,
        $cards = 5
    ): Response {
        if (($cards * $players) > 52) {
            return $this->render('cards/empty.html.twig');
        } elseif (($cards * $players) < 52) {
            $game = new Game();

            $gamer = $game->starthands($players, $cards);

            $data = [
                'hand' => $gamer
            ];
            return $this->render('cards/game.html.twig', $data);
        }
    }

    /**
     * @Route("/card/deck2", name="deck2")
     */
    public function deck2(): Response
    {
        $hand = new Hand();
        $value = $hand->showJoker();

        $data = [
            'hand' => $value
        ];

        return $this->render('cards/cardgame.html.twig', $data);
    }
}
