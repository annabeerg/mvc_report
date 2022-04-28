<?php

namespace App\Card;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class CardGraphic.
 */

class CardGraphictest extends TestCase
{
    /**
     * Tests class object is correct.
     */
    public function testCreateWithNoArguments()
    {
        $game = new CardGraphic();
        $this->assertInstanceOf("App\Card\CardGraphic", $game);
    }

    /**
     * Tests method getname returns expected value in class CardGraphic.
     * @return expected value
     * @param string
     */
    public function testgetname()
    {
        $game = new CardGraphic();

        $this->assertEquals("2 of hearts", $game->getname(0));
        $this->assertEquals("5 of hearts", $game->getname(3));
    }

    /**
     * Tests method getstring returns expected value in class CardGraphic.
     * @return expected value
     * @param string
     */
    public function testgetstring()
    {
        $game = new CardGraphic();

        $this->assertEquals("2 of hearts", $game->getAsString(1));
        $this->assertEquals("5 of hearts", $game->getAsString(4));
    }
}
