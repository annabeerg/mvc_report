<?php

namespace App\Project;

use App\Project\Cards;

/**
 * Class CardHand
 */

class CardHands
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
