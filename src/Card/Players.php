<?php

namespace App\Card;

/**
 * Class Players
 */

class Players
{
    protected $player;

    /**
     * Method set. Set protected variable player
     * @param int
     */
    public function set($play): void
    {
        $this->player = $play;
    }

    /**
     * Method get
     * @return variable player
     */
    public function get()
    {
        return $this->player;
    }
}
