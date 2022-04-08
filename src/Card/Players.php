<?php

namespace App\Card;

class Players
{
    protected $player;

    public function set($play): void
    {
        $this->player = $play;
    }
}
