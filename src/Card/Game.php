<?php

namespace App\Card;

use App\Card\Card;

/**
 * Class Game
 */

class Game
{
    protected $players = [];
    protected $hands = [];
    protected $allplayingcards = [];
    protected $cards;
    protected $card;

    /**
     * Construct new CardGraphic object
     */
    public function __construct()
    {
        $this->card = new CardGraphic();
    }

    /**
     * Method setplayers. Set Player objects.
     */
    public function setplayers(int $players): void
    {
        for ($x = 0; $x <= $players; $x++) {
            $player = new Players();
            $player->set($x);
            $this->players = $player;
        }
    }

    /**
     * Method sethands. Sets hand objects with cards.
     */
    public function sethands(int $number): void
    {
        $hand = new CardHand();
        for ($i = 0; $i <= $number - 1; $i++) {
            $value = $this->cards->add();
            $hand->set($value);
        }
        $handler = $hand->get();
        array_push($this->hands, $handler);
    }

    /**
     * Method getcards. Set varieble sethands with hand objects from players.
     * @return void
     */
    public function getcards(int $players, int $number): void
    {
        $this->cards = new Hand();
        $this->setplayers($players);
        for ($i = 0; $i <= $players - 1; $i++) {
            $this->sethands($number);
        }
    }

    /**
     * Method starthands.
     * Sets getcards method.
     * @return array
     */
    public function starthands(int $players, int $number)
    {
        $this->getcards($players, $number);
        return $this->hands;
    }

    /**
     * Method getAsString
     * @return string
     */
    public function getAsString(): string
    {
        return "[{$this->players}]";
    }
}
