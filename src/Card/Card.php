<?php

namespace App\Card;

class Card
{
    protected $value;

    public function __construct()
    {
        $this->value = random_int(1, 52);
    }

    public function get($number): int
    {
        $this->value = $number;
        return $this->value;
    }

    public function roll(): int
    {
        $this->value = random_int(1, 52);
        return $this->value;
    }

    public function getAsString(): string
    {
        return "[{$this->value}]";
    }
}
