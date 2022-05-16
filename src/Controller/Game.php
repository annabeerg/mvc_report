<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use App\Card\Hand;
use App\Card\GameCheck;
use App\Card\Helpers;

class Game extends AbstractController
{
    /**
     * @Route("/game/card", name="documentation")
     */
    public function card(): Response
    {
        return $this->render('game/documentation.html.twig');
    }

    /**
     * @Route("/game/start", name="start")
     */
    public function start(): Response
    {
        return $this->render('game/home.html.twig');
    }

    /**
     * @Route(
     *      "/game",
     *      name="game",
     *      methods={"GET"}
     * )
     */
    public function gameBoard(
        SessionInterface $session
    ): Response {
        $game = $session->get("game1") ?? 0;
        ;
        $gamerone = $session->get("gamerone") ?? 0;
        $gamertwo = $session->get("gamertwo") ?? 0;
        $winner = "empty";

        $standcounter = $session->get("stand") ?? 0;
        ;

        if ($game == 0) {
            $game = new Hand();
            $gamer = $game->add();
            $gamer2 = $game->add();

            $points1 = new GameCheck();
            $points2 = new GameCheck();
            $pointsone = $points1 ->getter($gamer);
            $pointstwo = $points2 ->getter($gamer2);

            $session->set("playeronepoints", $pointsone);
            $session->set("playertwopoints", $pointstwo);
            $session->set("game1", $gamer);
            $session->set("game2", $gamer2);
            $session->set("game", $game);


            $data = [
                'hand1' => $gamer,
                'hand2' => $gamer2,
                'points1' => $pointsone,
                'points2' => $pointstwo,
                'winner' => $winner,
                'playerone' => $gamerone,
                'playertwo' => $gamertwo
            ];
            return $this->render('game/gameboard.html.twig', $data);
        }
        $pointsone = $session->get("playeronepoints");
        $pointstwo = $session->get("playertwopoints");
        $playeronecard = $session->get("game1");
        $playertwocard = $session->get("game2");
        $gamerone = $session->get("gamerone");
        $gamertwo = $session->get("gamertwo");
        $help = new Helpers();

        if ($pointsone != 21 or $pointstwo != 21 or $pointsone < 21 or $pointstwo < 21) {
            if ($standcounter == 1) {
                $session->set("game1", 0);
                $game = new Hand();
                $session->set("game", $game);
                $session->set("stand", 0);
                $winner = $help->helper(
                    $pointstwo,
                    $pointsone,
                    $winner,
                    $game
                );
            }
            $winner = $help->helpertwo(
                $pointstwo,
                $pointsone,
                $winner
            );
            if ($winner == "You won!") {
                $session->set("game1", 0);
                $gameronetotal = $gamerone + 1;
                $session->set("gamerone", $gameronetotal);
                $session->set("playeronepoints", 0);
                $session->set("playertwopoints", 0);
            } elseif ($winner == "Computer won!") {
                $session->set("game1", 0);
                $gamertwototal = $gamertwo + 1;
                $session->set("gamertwo", $gamertwototal);
                $session->set("playeronepoints", 0);
                $session->set("playertwopoints", 0);
            }
        }
        $data = [
                'hand1' => $playeronecard,
                'hand2' => $playertwocard,
                'points1' => $pointsone,
                'points2' => $pointstwo,
                'winner' => $winner,
                'playerone' => $gamerone,
                'playertwo' => $gamertwo
            ];
        return $this->render('game/gameboard.html.twig', $data);
    }

    /**
     * @Route(
     *      "/game",
     *      name="game-process",
     *      methods={"POST"}
     * )
     */
    public function process(
        Request $request,
        SessionInterface $session
    ): Response {
        $game = $session->get("game");
        $session->set("stand", 0);

        $hit  = $request->request->get('hit');
        $stand = $request->request->get('stand');
        $new = $request->request->get('new');

        if ($hit) {
            $gamer = $game->add();

            $points1s = $session->get("playeronepoints");
            $points2s = $session->get("playertwopoints");

            $points1 = new GameCheck();
            $pointsone = $points1 ->getter($gamer);

            $pointsonetotal = $points1s + $pointsone;
            if ($points2s < 17) {
                $gamer2 = $game->add();
                $points2 = new GameCheck();
                $pointstwo = $points2 ->getter($gamer2);
                $pointstwototal = $points2s + $pointstwo;
                $session->set("playertwopoints", $pointstwototal);
                $session->set("game2", $gamer2);
            }

            $session->set("playeronepoints", $pointsonetotal);
            $session->set("game1", $gamer);
        } elseif ($stand) {
            $points2s = $session->get("playertwopoints");
            if ($points2s < 17) {
                $gamer2 = $game->add();

                $points2 = new GameCheck();
                $pointstwo = $points2 ->getter($gamer2);

                $pointstwototal = $points2s + $pointstwo;

                $session->set("playertwopoints", $pointstwototal);
                $session->set("game2", $gamer2);
            }
            $session->set("stand", 1);
        } elseif ($new) {
            $session->set("game1", 0);
        } elseif ($game) {
            $session->set("game1", 0);
            $session->set("gamerone", 0);
            $session->set("gamertwo", 0);
        }
        return $this->redirectToRoute('game');
    }
}
