<?php

namespace App\Card;

/**
 * Class CardJoker
 */

class CardJoker
{
    protected int $value;

    /**
     * Construct random number at initiation of the class.
     */
    public function __construct()
    {
        $this->value = random_int(1, 54);
    }

    /**
     * Method get
     * @return int
     */
    public function get(int $number): int
    {
        $this->value = $number;
        return $this->value;
    }

    /**
     * Method roll. Set variable value with random number between 1-52.
     * @return int
     */
    public function roll(): int
    {
        $this->value = random_int(1, 54);
        return $this->value;
    }

    /**
     * Method getAsString
     * @return string
     */
    public function getAsString(): string
    {
        return "[{$this->value}]";
    }
}
