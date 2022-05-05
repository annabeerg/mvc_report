<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Card\CardGraphicJoker;
use App\Card\Hand;

class Json
{
    /**
     * @Route(
     *      "/card/api/deck",
     *      name="api",
     *      methods={"GET"}
     * )
     */
    public function api(): Response
    {
        $json = [];

        $die = new CardGraphicJoker();

        $count = 0;
        while ($count <= 53) {
            $json[] = "{$die->getname($count)}";
            $count = $count + 1;
        }

        $data = [
            'Cards' => $json,
        ];
        return new JsonResponse($data);
    }
}
