<?php

namespace App\Card;

use App\Card\Card;

class CardHand
{
    protected $hand = [];

    public function set($card): void
    {
        {
            $this->hand[] = $card;
        }
    }

    public function get(): array
    {
        global $list;
        foreach ($this->hand as $finger) {
            $this->list[] = $finger;
        }
        return $this->list;
    }
}
