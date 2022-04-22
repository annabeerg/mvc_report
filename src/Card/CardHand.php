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
     * @param string
     */
    public function set($card): void
    {
        {
            $this->hand[] = $card;
        }
    }

    /**
     * Method get
     * @return array
     */
    public function get(): array
    {
        foreach ($this->hand as $finger) {
            $this->list[] = $finger;
        }
        return $this->list;
    }
}
