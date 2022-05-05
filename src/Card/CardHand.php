<?php

namespace App\Card;

use App\Card\Card;

/**
 * Class CardHand
 */

class CardHand
{
    protected $hand = [];
    protected $list = [];

    /**
     * Method set card into arrau hand
     * @return void
     */
    public function set(string $card): void
    {
        {
            $this->hand[] = $card;
        }
    }

    /**
     * Method get
     */
    public function get(): array
    {
        foreach ($this->hand as $finger) {
            $this->list[] = $finger;
        }
        return $this->list;
    }
}
