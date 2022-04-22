<?php

namespace App\Card;

/**
 * Class CardJoker
 */

class CardJoker
{
    protected $value;

    /**
     * Construct random number at initiation of the class.
     * @param int
     */
    public function __construct()
    {
        $this->value = random_int(1, 54);
    }

    /**
     * Method get
     * @return protected variable value
     * @param int
     */
    public function get($number): int
    {
        $this->value = $number;
        return $this->value;
    }

    /**
     * Method roll. Set variable value with random number between 1-52.
     * @return variable value
     * @param int
     */
    public function roll(): int
    {
        $this->value = random_int(1, 54);
        return $this->value;
    }

    /**
     * Method getAsString
     * @return variable value
     * @param string
     */
    public function getAsString(): string
    {
        return "[{$this->value}]";
    }
}
