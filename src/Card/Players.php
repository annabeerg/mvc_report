<?php

namespace App\Card;

/**
 * Class Players
 */

class Players
{
    protected int $player;

    /**
     * Method set. Set protected variable player
     */
    public function set(int $play): void
    {
        $this->player = $play;
    }

    /**
     * Method get
     * @return int
     */
    public function get()
    {
        return $this->player;
    }
}
