<?php

namespace App\Card;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class CardHandJoker.
 */

class CardsHandJokertest extends TestCase
{
    /**
     * Tests class object is correct.
     */
    public function testCreateWithNoArguments()
    {
        $game = new CardHand();
        $this->assertInstanceOf("App\Card\CardHand", $game);
    }

    /**
     * Tests method roll returns array with values in expected order in class CardHandJoker.
     * @return array with expected values
     * @param int
     */
    public function testroll()
    {
        $game = new CardHand;

        $game->set(1);
        $game->set(2);
        $game->set(3);
        $game->set(4);

        $this->assertEquals([1, 2, 3, 4], $game->get(3));
    }

}
