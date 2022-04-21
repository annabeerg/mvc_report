<?php

namespace App\Card;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Hand.
 */

class Handtest extends TestCase
{
    public function testCreateWithNoArguments()
    {
        $game = new Hand();
        $this->assertInstanceOf("App\Card\Hand", $game);
    }

    public function testshowjoker()
    {
        $game = new Hand();

        $this->assertIsArray($game->showJoker());
    }

    public function testshow()
    {
        $game = new Hand();

        $this->assertIsArray($game->show());
    }

    public function testadd()
    {
        $game = new Hand();

        $this->assertIsString($game->add());
    }

    public function testadder()
    {
        $game = new Hand();

        $this->assertIsString($game->adder());
    }

    public function testgetNumberDices()
    {
        $game = new Hand();

        $game->add();
        $game->add();
        $game->add();
        $this->assertIsInt($game->getNumberDices());
    }

    public function testget()
    {
        $game = new Hand();

        $game->add();
        $game->add();
        $game->add();
        $this->assertIsArray($game->getAsString());
    }

    public function testgethand()
    {
        $game = new Hand();

        $game->add();
        $game->add();
        $game->add();
        $this->assertIsArray($game->getAsStringhand());
    }
}
