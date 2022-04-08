<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

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
        $hand = new \App\Card\Hand();
        $json = [];

        $die = new \App\Card\CardGraphicJoker();

        $i = 0;
        while ($i <= 53) {
            $json[] = "{$die->getname($i)}";
            $i = $i + 1;
        }

        $data = [
            'Cards' => $json,
        ];
        return new JsonResponse($data);
    }
}
