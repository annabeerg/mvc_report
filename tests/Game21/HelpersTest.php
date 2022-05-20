<?php

namespace App\Card;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Helpers.
 */

class Helperstest extends TestCase
{
    /**
     * Tests class object is correct.
     */
    public function testCreateWithNoArguments()
    {
        $game = new Helpers();
        $this->assertInstanceOf("App\Card\Helpers", $game);
    }

    /**
     * Tests method helper returns string with specific value.
     * @return string
     */
    public function testhelper()
    {
        $game = new Helpers();

        $this->assertIsString($game->helper(7, 9, "", new Hand()));
    }

    /**
     * Tests method helpertwo returns string with specific value.
     * @return string
     */
    public function testhelpertwo()
    {
        $game = new Helpers();

        $this->assertIsString($game->helpertwo(7, 9, ""));
    }

    /**
     * Tests method helper returns string with specific value.
     * @return string
     */
    public function testhelpervalue()
    {
        $game = new Helpers();

        $this->assertEquals($game->helper(17, 34, "", new Hand()), "You won!");
    }

    /**
     * Tests method helpertwo returns string with specific value.
     * @return string
     */
    public function testhelpertwovalue()
    {
        $game = new Helpers();

        $this->assertEquals($game->helpertwo(7, 21, ""), "You won!");
    }
}
