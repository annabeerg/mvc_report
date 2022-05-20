<?php

namespace App\Card;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class CardJoker.
 */

class CardJokertest extends TestCase
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
     * Tests method roll returns expected value in class CardJoker.
     * @return Int
     */
    public function testroll()
    {
        $game = new Card;

        $this->assertIsInt($game->roll());
    }

    /**
     * Tests method get returns expected value in class CardJoker.
     * @return expected value
     * @param int
     */
    public function testget()
    {
        $game = new CardJoker();

        $this->assertEquals(3, $game->get(3));
        $this->assertEquals(88, $game->get(88));
    }
}
