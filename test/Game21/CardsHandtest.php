<?php

namespace App\Card;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class CardHandJoker.
 */

class CardsHandJokertest extends TestCase
{
    public function testCreateWithNoArguments()
    {
        $game = new CardHand();
        $this->assertInstanceOf("App\Card\CardHand", $game);
    }

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
