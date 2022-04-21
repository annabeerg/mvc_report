<?php

namespace App\Card;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Players.
 */

class Playerstest extends TestCase
{
    public function testCreateWithNoArguments()
    {
        $game = new Players();
        $this->assertInstanceOf("App\Card\Players", $game);
    }

    public function teststarthands()
    {
        $game = new Players();
        $game->set("one");
        $this->assertEquals($game->get(), "one");
    }
}
