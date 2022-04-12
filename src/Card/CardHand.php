<?php

namespace App\Card;

use App\Card\Card;

class CardHand
{
    protected $hand = [];
    protected $list = [];

    public function set($card): void
    {
        {
            $this->hand[] = $card;
        }
    }

    public function get(): array
    {
        foreach ($this->hand as $finger) {
            $this->list[] = $finger;
        }
        return $this->list;
    }
}
