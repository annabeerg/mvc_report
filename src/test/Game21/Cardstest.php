<?php

namespace App\Card;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Card.
 */

class Cardstest extends TestCase
{
/**
 * Tests class object is correct.
 */
    public function testCreateWithNoArguments()
    {
        $game = new Card();
        $this->assertInstanceOf("App\Card\Card", $game);
    }

    /**
     * Tests method testroll returns int when initiation in class Cards.
     * @return Int
     */
    public function testroll()
    {
        $game = new Card;

        $this->assertIsInt($game->roll());
    }

    /**
     * Tests method get returns expected value in class Cards.
     * @return expected value
     */
    public function testget()
    {
        $game = new GameCheck();

        $this->assertEquals(3, $game->get(3));
        $this->assertEquals(88, $game->get(88));
    }
}
