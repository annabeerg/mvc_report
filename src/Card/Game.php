<?php

namespace App\Card;

use App\Card\Card;

class Game
{
    protected $players = [];
    protected $hands = [];
    protected $allplayingcards = [];
    protected $cards;

    public function get($number): array
    {
        if (($number - 1) >= count($this->players)) {
            return $this->players[$number];
        }
        return "No such player";
    }

    public function setplayers($players): void
    {
        for ($x = 0; $x <= $players; $x++) {
            $player = new Players();
            $player->set($x);
            $this->players = $player;
        }
    }

    public function sethands($number): void
    {
        $hand = new CardHand();
        for ($i = 0; $i <= $number - 1; $i++) {
            $value = $this->cards->add();
            $hand->set($value);
        }
        $handler = $hand->get();
        array_push($this->hands, $handler);
    }

    public function getcards($players, $number): void
    {
        $this->cards = new Hand();
        $this->setplayers($players);
        for ($i = 0; $i <= $players - 1; $i++) {
            $this->sethands($number);
        }
    }

    public function starthands($players, $number)
    {
        $this->getcards($players, $number);
        return $this->hands;
    }

    public function getAsString(): string
    {
        return "[{$this->players}]";
    }
}
