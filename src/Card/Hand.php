<?php

namespace App\Card;

use App\Card\Card;

/**
 * Class Hand
 */

class Hand
{
    public $hand = [];
    public $deck = [];
    public $list = [];
    public $card;
    public $die;

    /**
     * Construct new CardGraphic object
     */
    public function __construct()
    {
        $this->die = new CardGraphic();
    }

    /**
     * Method roll. If card object is in array deck, create new card object.
     * If not in array, append array.
     */
    public function roll(Card $die): void
    {
        if (! in_array($die, $this->deck)) {
            $this->deck[] = $die;
        }
        $this->roll(new CardGraphic());
    }

    /**
     * Method showJoker
     * @return array
     */
    public function showJoker(): array
    {
        global $die;

        $die = new CardGraphicJoker();

        $count = 1;
        while ($count <= 54) {
            $this->deck[] = $die->getter($count);
            $count = $count + 1;
        }

        return $this->deck;
    }

    /**
     * Method show
     * @return array
     */
    public function show(): array
    {
        global $die;

        $die = new CardGraphic();

        $count = 0;
        while ($count <= 51) {
            $this->deck[] = $die->getter($count);
            $count = $count + 1;
        }

        return $this->deck;
    }

    /**
     * Method addhand.
     * Adds card to hand array. If in array, create new card and check array else add to hand.
     */
    public function addhand(): void
    {
        global $die;

        $die = new CardGraphic();
        if (! in_array($die, $this->hand)) {
            $this->hand[] = $die;
            $this->card = $die->getAsString();
        } elseif (in_array($die, $this->hand)) {
            $this->add();
        }
    }

    /**
     * Method sethand. Alternative to addhand method. Also sets card variable.
     */
    public function sethand(int $number): void
    {
        global $die;
        global $value;

        $die = new CardGraphic();
        $value = $die->getter($number);

        if (! in_array($value, $this->hand)) {
            $this->hand[] = $die;
            $this->card = $die->getAsString();
        } elseif (in_array($value, $this->hand)) {
            $this->add();
        }
    }

    /**
     * Method __toString
     * @return string
     */
    public function __toString(): string
    {
        return $this->card;
    }

    /**
     * Method hand
     * @return array of array of cards
     */
    public function hand(): array
    {
        global $handler;
        $handler = $this->getAsString();
        return $handler;
    }

    /**
     * Method add.
     * @return string 
     */
    public function add()
    {
        $this->addhand();
        return $this->__toString();
    }

    /**
     * Method adder.
     * @return string
     */
    public function adder()
    {
        $this->addhand();
        return $this->__toString();
    }

    /**
     * Method getNumber. Counts array hand.
     * @return int
     */
    public function getNumberDices(): int
    {
        return count($this->hand);
    }

    /**
     * Method getAsString returns array of deck.
     * @return array
     */
    public function getAsString(): array
    {
        foreach ($this->deck as $die) {
            $this->list[] = $die->getAsString();
        }
        return $this->list;
    }

    /**
     * Method getAsString return aray of hand.
     * @return array
     */
    public function getAsStringhand(): array
    {
        foreach ($this->hand as $finger) {
            $this->list[] = $finger->getAsString();
        }
        return $this->list;
    }
}
