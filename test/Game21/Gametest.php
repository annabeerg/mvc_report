<?php

namespace App\Card;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Game.
 */

class Gametest extends TestCase
{
    
/**
 * Tests class object is correct.
 */
    public function testCreateWithNoArguments()
    {
        $game = new Game();
        $this->assertInstanceOf("App\Card\Game", $game);
    }

    /**
     * Tests method starthands returns array in class Game.
     * @param int $players, int $number
     * @return array
     */
    public function teststarthands()
    {
        $game = new Game();

        $this->assertIsArray($game->starthands(3, 5));
    }
}
