<?php

namespace App\Card;

use App\Card\Card;

class Hand
{
    public $hand = [];
    public $deck = [];
    public $list = [];
    public $card;

    public function roll(Card $die): void
    {
        if (! in_array($die, $this->deck)) {
            $this->deck[] = $die;
        } else {
            $this->roll(new CardGraphic());
        }
    }

    public function showJoker()
    {
        global $die;
        global $value;

        $die = new CardGraphicJoker();

        $i = 1;
        while ($i <= 54) {
            $this->deck[] = $die->getter($i);
            $i = $i + 1;
        }

        return $this->deck;
    }

    public function show()
    {
        global $die;
        global $value;

        $die = new CardGraphic();

        $i = 0;
        while ($i <= 51) {
            $this->deck[] = $die->getter($i);
            $i = $i + 1;
        }

        return $this->deck;
    }

    public function addhand(): void
    {
        global $die;

        $die = new CardGraphic();

        if (! in_array($die, $this->hand)) {
            $this->hand[] = $die;
            $this->card = $die->getAsString();
        } else {
            $this->add(new CardGraphic());
        }
    }

    public function sethand($number): void
    {
        global $die;
        global $value;

        $die = new CardGraphic();
        $value = $die->getter($number);

        if (! in_array($value, $this->hand)) {
            $this->hand[] = $die;
            $this->card = $die->getAsString();
        } else {
            $this->add(new CardGraphic());
        }
    }

    public function __toString()
    {
        return $this->card;
    }

    public function hand(): array
    {
        global $handler;
        $handler = $this->getAsString();
        return $handler;
    }

    public function add()
    {
        $this->addhand();
        return $this->__toString();
    }

    public function adder()
    {
        $this->addhand();
        return $this->__toString();
    }

    public function getNumberDices(): int
    {
        return count($this->hand);
    }

    public function getAsString(): array
    {
        global $list;
        foreach ($this->deck as $die) {
            $this->list[] = $die->getAsString();
        }
        return $this->list;
    }

    public function getAsStringhand(): array
    {
        foreach ($this->hand as $finger) {
            $this->list[] = $finger->getAsString();
        }
        return $this->list;
    }
}
