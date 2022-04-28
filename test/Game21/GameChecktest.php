<?php

namespace App\Card;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class GameCheck.
 */

class GameChecktest extends TestCase
{
    /**
     * Construct object and verify that the object is of expected instance.
     * Use no arguments.
     */

    public function testCreateWithNoArguments()
    {
        $game = new GameCheck();
        $this->assertInstanceOf("App\GameCheck\GameCheck", $game);
    }

    /**
     * Construct objekt and method getter to see if method returns expected result.
     */

    public function testgetter()
    {
        $game = new GameCheck();

        $this->assertEquals(13, $game->getter("k"));
        $this->assertEquals(3, $game->getter("3"));
        $this->assertEquals(10, $game->getter("1"));
    }

        /**
     * Construct objekt and method getters to see if method returns expected result.
     */

    public function testgetters()
    {
        $game = new GameCheck();
        $res = $game->getters("2", 1);

        $this->assertEquals(2, $res);
        $this->assertEquals(3, $game->getters("3", 1));
        $this->assertEquals(9, $game->getters("9", 1));
    }
}
