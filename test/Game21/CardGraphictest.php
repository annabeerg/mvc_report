<?php

namespace App\Card;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class CardGraphic.
 */

class CardGraphicJokertest extends TestCase
{
    public function testCreateWithNoArguments()
    {
        $game = new CardGraphic();
        $this->assertInstanceOf("App\Card\CardGraphic", $game);
    }

    public function testgetname()
    {
        $game = new CardGraphic();

        $this->assertEquals("2 of hearts", $game->getname(0));
        $this->assertEquals("5 of hearts", $game->getname(3));
    }

    public function testgetstring()
    {
        $game = new CardGraphic();

        $this->assertEquals("2 of hearts", $game->getAsString(1));
        $this->assertEquals("5 of hearts", $game->getAsString(4));
    }
}
