<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use App\Project\Hands;
use App\Project\Helper;
use App\Project\Gamer;
use App\Project\Rules;

class Pro extends AbstractController
{
    /**
     * @Route("/p",
     * name="projesssct")
     */
    public function home(
        SessionInterface $session
    ): Response {
        $game = $session->get("game") ?? 0;
        $hand = $session->get("hand") ?? 0;
        $handplayer = $session->get("HandPlayer") ?? 0;
        $handbank = $session->get("HandBank") ?? 0;
        $playermoney = $session->get("PlayerMoney") ?? 0;
        $bankmoney = $session->get("BankMoney") ?? 0;
        $playerpot = $session->get("PlayerPot") ?? 0;

        $session->set("game", 0);
        $session->set("HandPlayer", 0);
        $session->set("HandBank", 0);
        $session->set("PlayerMoney", 5000);
        $session->set("BankMoney", 0);
        $session->set("PlayerPot", 0);

        return $this->render('project/home.html.twig');
    }

    /**
     * @Route("/p/a",
     * name="project-asssbout")
     */
    public function about(): Response
    {
        return $this->render('project/home.html.twig');
    }

    /**
     * @Route(
     *      "/poker",
     *      name="poker",
     *      methods={"HEAD", "GET"}
     * )
     */
    public function gameBoard(
        SessionInterface $session
    ): Response {
        return $this->render('project/poker.html.twig');
    }

    /**
     * @Route(
     *      "/poker",
     *      name="poker-processor",
     *      methods={"POST"}
     * )
     */
    public function processor(
        SessionInterface $session
    ): Response {
        $games = $session->get("game");
        $handplayer = $session->get("HandPlayer");
        $handbank = $session->get("HandBank");
        $playermoney = $session->get("PlayerMoney");
        $bankmoney = $session->get("BankMoney");
        $playerpot = $session->get("PlayerPot");

        if ($games == 0) {
            $game = new Hands();
            $gamer = $game->add();
            $gamer2 = $game->adder();
            $session->set("game", 1);
            $session->set("hand", $game);
            $session->set("HandPlayer", $gamer);
            $session->set("HandBank", $gamer2);
        }
        $gamer = $session->get("HandPlayer");
        $gamer1 = $session->get("HandBank");

        $session->set("PlayerPot", $_POST["bet"]);

        return $this->redirectToRoute('poker-cards');
    }

    /**
     * @Route(
     *      "/poker/cards",
     *      name="poker-cards",
     *      methods={"HEAD", "GET"}
     * )
     */
    public function cards(
        SessionInterface $session
    ): Response {
        $playerpot = $session->get("PlayerPot");
        $gamer = $session->get("HandPlayer");

        $data = [
            'hand' => $gamer,
            "bet" => $playerpot
            ];
        return $this->render('project/changecards.html.twig', $data);
    }

    /**
     * @Route(
     *      "/poker/cards",
     *      name="card-processor",
     *      methods={"POST"}
     * )
     */
    public function cardprocess(
        SessionInterface $session,
        Request $request
    ): Response {
        $games = $session->get("game");
        $hand = $session->get("hand");
        $handplayer = $session->get("HandPlayer");
        $handbank = $session->get("HandBank");
        $playermoney = $session->get("PlayerMoney");
        $bankmoney = $session->get("BankMoney");
        $playerpot = $session->get("PlayerPot");

        $hit = $request->request->get('box0');
        $hit1 = $request->request->get('box1');
        $hit2 = $request->request->get('box2');
        $hit3 = $request->request->get('box3');
        $hit4 = $request->request->get('box4');

        print_r($hand->getAsStringlist());

        if ($hit4) {
            $handplayer = $hand -> setterplayer(4, $handplayer);
        }
        if ($hit3) {
            $handplayer = $hand -> setterplayer(3, $handplayer);
        }
        if ($hit2) {
            $handplayer = $hand -> setterplayer(2, $handplayer);
        }
        if ($hit1) {
            $handplayer = $hand -> setterplayer(1, $handplayer);
        }
        if ($hit) {
            $handplayer = $hand -> setterplayer(0, $handplayer);
        }
        $hand = $session->set("hand", $hand);
        $session->set("HandPlayer", $handplayer);

        $rule = new Rules($handplayer);
        $points = $rule->mainrule();

        $data = [
            'hand' => $handplayer,
            "bet" => "300"
            ];
        return $this->render('project/changecards.html.twig', $data);
    }
}
