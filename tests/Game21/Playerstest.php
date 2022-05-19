<?php

namespace App\Card;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Players.
 */

class Playerstest extends TestCase
{
/**
 * Tests class object is correct.
 */

    public function testCreateWithNoArguments()
    {
        $game = new Players();
        $this->assertInstanceOf("App\Card\Players", $game);
    }

    /**
 * Tests method in class player, see if set it correct and sets player variable.
 * @param string
 * @return string
 */
    public function testget()
    {
        $game = new Players();
        $game->set(1);
        $this->assertEquals($game->get(), 1);
    }
}
