<?php

namespace App\Card;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Game.
 */

class Gametest extends TestCase
{
    public function testCreateWithNoArguments()
    {
        $game = new Game();
        $this->assertInstanceOf("App\Card\Game", $game);
    }

    public function teststarthands()
    {
        $game = new Game();

        $this->assertIsArray($game->starthands(3, 5));
    }
}
