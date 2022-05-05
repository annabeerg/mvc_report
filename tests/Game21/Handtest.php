<?php

namespace App\Card;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Hand.
 */

class Handtest extends TestCase
{
    /**
     * Tests class object is correct.
     */
    public function testCreateWithNoArguments()
    {
        $game = new Hand();
        $this->assertInstanceOf("App\Card\Hand", $game);
    }

    /**
     * Tests method showjoker returns array in class hand.
     * @return array
     */
    public function testshowjoker()
    {
        $game = new Hand();

        $this->assertIsArray($game->showJoker());
    }

    /**
     * Tests method show returns array in class hand.
     * @return array
     */
    public function testshow()
    {
        $game = new Hand();

        $this->assertIsArray($game->show());
    }

    /**
     * Tests method add returns string in class hand.
     * @return string
     */
    public function testadd()
    {
        $game = new Hand();

        $this->assertIsString($game->add());
    }

    /**
     * Tests method adder returns string in class hand.
     * @return string
     */
    public function testadder()
    {
        $game = new Hand();

        $this->assertIsString($game->adder());
    }

    /**
     * Tests method getNumberDices returns int in class hand.
     * @return int
     */
    public function testgetNumberDices()
    {
        $game = new Hand();

        $game->add();
        $game->add();
        $game->add();
        $this->assertIsInt($game->getNumberDices());
    }

    /**
     * Tests method get returns array in class hand.
     * @return array
     */
    public function testget()
    {
        $game = new Hand();

        $game->add();
        $game->add();
        $game->add();
        $this->assertIsArray($game->getAsString());
    }

    /**
     * Tests method gethand returns array in class hand.
     * @return array
     */
    public function testgethand()
    {
        $game = new Hand();

        $game->add();
        $game->add();
        $game->add();
        $this->assertIsArray($game->getAsStringhand());
    }
}
