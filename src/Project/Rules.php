<?php

namespace App\Project;

use App\Project\GameChecker;

/**
 * Class Card.
 */

class Rules
{
    public $hand;
    public $newhand;
    public $sortedhand;

    /**
     * Construct hand array at initiation of the class.
     */
    public function __construct($hand)
    {
        $this->hand = $hand;
        $checker = new Gamechecker();
        $array = $checker->changer($this->hand);
        $this->newhand = $array;
        $checker = new Gamechecker();
        $array = $checker->advancedchanger($this->hand);
        $this->sortedhand = $array;
    }

    /**
     * Method get
     * @return int
     */
    public function mainrule(): int
    {
        return $this->royalflush();
    }

    /**
     * Method get
     * @return int
     */
    public function royalflush(): int
    {
        return $this->straightflush();
    }

    /**
     * Method get
     * @return int
     */
    public function straightflush(): int
    {
        return $this->fourofakind();
    }

    /**
     * Method get
     * @return int
     */
    public function fourofakind(): int
    {
        return $this->fullhouse();
    }

    /**
     * Method get
     * @return int
     */
    public function fullhouse(): int
    {
        return $this->flush();
    }

    /**
     * Method get
     * @return int
     */
    public function flush(): int
    {
        return $this->straight();
    }

    /**
     * Method get
     * @return int
     */
    public function straight(): int
    {
        return $this->threeofakind();
    }

    /**
     * Method get
     * @return int
     */
    public function threeofakind(): int
    {
        $counted = array_count_values($this->newhand);
        foreach ($counted as $value) {
            if ($value == 3) {
                return 40;
            }
        }
        return $this->twopair();
    }

    /**
     * Method get
     * @return int
     */
    public function twopair(): int
    {
        $counted = array_count_values($this->newhand);
        $final = 0;
        foreach ($counted as $value) {
            if ($value == 2) {
                $final = $final + 1;
                if ($final == 2) {
                    return 30;
                }
            }
        }
        return $this->pair();
    }

    /**
     * Method get
     * @return int
     */
    public function pair(): int
    {
        $counted = array_count_values($this->newhand);
        foreach ($counted as $value) {
            if ($value == 2) {
                return 20;
            }
        }
        return $this->highestcard();
    }

    /**
     * Method highestcard.
     * If no other rule apply the value of the highest card is returned.
     * @return int
     */
    public function highestcard(): int
    {
        $final = 0;
        foreach ($this->hand as $value) {
            $checker = new Gamechecker();
            $number = $checker->getter($value);
            if ($number == 0) {
                $number = 14;
            }
            if ($number > $final) {
                $final = $number;
            }
        }
        return $final;
    }
}
