<?php

namespace App\Card;

class CardJoker extends Card
{
    protected $value;


    public function __construct()
    {
        $this->value = random_int(1, 54);
    }

    public function get($number): int
    {
        $this->value = $number;
        return $this->value;
    }

    public function roll(): int
    {
        $this->value = random_int(1, 54);
        return $this->value;
    }

    public function getAsString(): string
    {
        return "[{$this->value}]";
    }
}
