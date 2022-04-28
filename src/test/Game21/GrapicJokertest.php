<?php

namespace App\Card;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class CardGraphicJoker.
 */

class GraphicJokertest extends TestCase
{
    /**
     * Tests class object is correct.
     */
    public function testCreateWithNoArguments()
    {
        $game = new CardGraphicJoker();
        $this->assertInstanceOf("App\Card\CardGraphic", $game);
    }

    /**
     * Tests method getname returns expected value in class CardGraphic.
     * @return expected value
     * @param string
     */
    public function testgetname()
    {
        $game = new CardGraphicJoker();

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
        $game = new CardGraphicJoker();

        $this->assertEquals("2 of hearts", $game->getAsString(1));
        $this->assertEquals("5 of hearts", $game->getAsString(4));
    }

    /**
     * Tests method getter returns expected value in class CardGraphic.
     * @return expected value
     * @param string
     */
    public function testgetter()
    {
        $game = new CardGraphicJoker();

        $this->assertEquals("images/cards/2_of_hearts.png", $game->getter(1));
        $this->assertEquals("images/cards/5_of_hearts.png", $game->getter(4));
    }
}
