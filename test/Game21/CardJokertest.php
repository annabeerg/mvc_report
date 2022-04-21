<?php

namespace App\Card;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class CardJoker.
 */

class CardJokertest extends TestCase
{
    public function testCreateWithNoArguments()
    {
        $game = new Card();
        $this->assertInstanceOf("App\Card\Card", $game);
    }

    public function testroll()
    {
        $game = new Card;

        $this->assertIsInt($game->roll());
    }

    public function testget()
    {
        $game = new GameCheck();

        $this->assertEquals(3, $game->get(3));
        $this->assertEquals(88, $game->get(88));
    }
}
