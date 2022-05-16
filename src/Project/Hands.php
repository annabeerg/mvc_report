<?php

namespace App\Project;

use App\Project\Cards;

/**
 * Class Hand
 */

class Hands
{
    public $handplayer = [];
    public $handbank = [];
    public $list = [];
    public $lister = [];
    public $listerhand = [];
    public $listerbank = [];
    public $card;
    public $die;

    /**
     * Construct new CardGraphic object
     */
    public function __construct()
    {
        $this->die = new Graphic();
    }

    /**
     * Method addhand.
     * Adds card to hand array. If in array, create new card and check array else add to hand.
     */
    public function handplayer(): void
    {
        global $die;

        if (count($this->handplayer) <= 4) {
            $die = new Graphic();
            if (! in_array($die, $this->list)) {
                $this->handplayer[] = $die;
                $this->list[] = $die;
                $this->handplayer();
            } elseif (in_array($die, $this->list)) {
                $this->handplayer();
            }
        }
    }

    /**
     * Method addhand.
     * Adds card to hand array. If in array, create new card and check array else add to hand.
     */
    public function handbank(): void
    {
        global $die;
        if (count($this->handbank) <= 4) {
            $die = new Graphic();
            if (! in_array($die, $this->list)) {
                $this->handbank[] = $die;
                $this->list[] = $die;
                $this->handbank();
            } elseif (in_array($die, $this->list)) {
                $this->handbank();
            }
        }
    }

    /**
     * Method add.
     * @return string
     */
    public function add()
    {
        $this->handplayer();
        return $this->getAsStringhand();
    }

    /**
     * Method adder.
     * @return string
     */
    public function adder()
    {
        $this->handbank();
        return $this->getAsString();
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
        $this->listerbank = [];
        foreach ($this->handbank as $die) {
            $this->listerbank[] = $die->getAsString();
        }
        return $this->listerbank;
    }

    /**
     * Method getAsString return aray of hand.
     * @return array
     */
    public function getAsStringhand(): array
    {
        $this->listerplayer = [];
        foreach ($this->handplayer as $die) {
            $this->listerhand[] = $die->getAsString();
        }
        return $this->listerhand;
    }

    /**
     * Method getAsString return aray of hand.
     * @return array
     */
    public function getAsStringlist(): array
    {
        $this->lister = [];
        foreach ($this->list as $die) {
            $this->lister[] = $die->getAsString();
        }
        return $this->listerhand;
    }

    /**
     * Method hand
     * @return array of array of cards
     */
    public function handplayers(): array
    {
        return $this->handplayer;
    }

    /**
     * Method hand
     * @return array of array of cards
     */
    public function handbanks(): array
    {
        return $this->listerbank;
    }

    /**
     * Method addhand.
     * Adds card to hand array. If in array, create new card and check array else add to hand.
     */
    public function setterplayer(int $index, $array): array
    {
        array_splice($array, $index, 1);
        $this->roll();
        $array[] = $this->card;
        $this->handplayer = $array;
        return $array;
    }

    /**
     * Method roll. If card object is in array deck, create new card object.
     * If not in array, append array.
     */
    public function toString(): string
    {
        return $this->card;
    }

    /**
     * Method roll. If card object is in array deck, create new card object.
     * If not in array, append array.
     */
    public function roll(): void
    {
        global $die;
        $die = new Graphic();
        print_r(count($this->list));
        if (! in_array($die, $this->list)) {
            $this->card = $die->getAsString();
            $this->list[] = $die;
        } elseif (in_array($die, $this->list)) {
            $this->roll();
        }
    }

    /**
     * Method addhand.
     * Adds card to hand array. If in array, create new card and check array else add to hand.
     */
    public function setterbank(int $index, $array): array
    {
        global $die;

        $die = new Graphic();

        unset($this->handplayer[$index]);
        if (! in_array($die, $this->list)) {
            $this->handplayer[] = $die;
            $this->list[] = $die;
            $this->handplayer();
        } elseif (in_array($die, $this->list)) {
            $this->handplayer();
        }
    }
}
