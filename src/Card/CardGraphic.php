<?php

namespace App\Card;

class CardGraphic extends Card
{
    private $representation = [
        "images/cards/2_of_hearts.png",
        "images/cards/3_of_hearts.png",
        "images/cards/4_of_hearts.png",
        "images/cards/5_of_hearts.png",
        "images/cards/6_of_hearts.png",
        "images/cards/7_of_hearts.png",
        "images/cards/8_of_hearts.png",
        "images/cards/9_of_hearts.png",
        "images/cards/10_of_hearts.png",
        "images/cards/jack_of_hearts.png",
        "images/cards/queen_of_hearts.png",
        "images/cards/king_of_hearts.png",
        "images/cards/ace_of_hearts.png",
        "images/cards/2_of_diamonds.png",
        "images/cards/3_of_diamonds.png",
        "images/cards/4_of_diamonds.png",
        "images/cards/5_of_diamonds.png",
        "images/cards/6_of_diamonds.png",
        "images/cards/7_of_diamonds.png",
        "images/cards/8_of_diamonds.png",
        "images/cards/9_of_diamonds.png",
        "images/cards/10_of_diamonds.png",
        "images/cards/jack_of_diamonds.png",
        "images/cards/queen_of_diamonds.png",
        "images/cards/king_of_diamonds.png",
        "images/cards/ace_of_diamonds.png",
        "images/cards/2_of_clubs.png",
        "images/cards/3_of_clubs.png",
        "images/cards/4_of_clubs.png",
        "images/cards/5_of_clubs.png",
        "images/cards/6_of_clubs.png",
        "images/cards/7_of_clubs.png",
        "images/cards/8_of_clubs.png",
        "images/cards/9_of_clubs.png",
        "images/cards/10_of_clubs.png",
        "images/cards/jack_of_clubs.png",
        "images/cards/queen_of_clubs.png",
        "images/cards/king_of_clubs.png",
        "images/cards/ace_of_clubs.png",
        "images/cards/2_of_spades.png",
        "images/cards/3_of_spades.png",
        "images/cards/4_of_spades.png",
        "images/cards/5_of_spades.png",
        "images/cards/6_of_spades.png",
        "images/cards/7_of_spades.png",
        "images/cards/8_of_spades.png",
        "images/cards/9_of_spades.png",
        "images/cards/10_of_spades.png",
        "images/cards/jack_of_spades.png",
        "images/cards/queen_of_spades.png",
        "images/cards/king_of_spades.png",
        "images/cards/ace_of_spades.png",
    ];

    private $name = [
        "2 of hearts",
        "3 of hearts",
        "4 of hearts",
        "5 of hearts",
        "6 of hearts",
        "7 of hearts",
        "8 of hearts",
        "9 of hearts",
        "10 of hearts",
        "jack of hearts",
        "queen of hearts",
        "king of hearts",
        "ace of hearts",
        "2 of diamonds",
        "3 of diamonds",
        "4 of diamonds",
        "5 of diamonds",
        "6 of diamonds",
        "7 of diamonds",
        "8 of diamonds",
        "9 of diamonds",
        "10 of diamonds",
        "jack of diamonds",
        "queen of diamonds",
        "king of diamonds",
        "ace of diamonds",
        "2 of clubs",
        "3 of clubs",
        "4 of clubs",
        "5 of clubs",
        "6 of clubs",
        "7 of clubs",
        "8 of clubs",
        "9 of clubs",
        "10 of clubs",
        "jack of clubs",
        "queen of clubs",
        "king of clubs",
        "ace of clubs",
        "2 of spades",
        "3 of spades",
        "4 of spades",
        "5 of spades",
        "6 of spades",
        "7 of spades",
        "8 of spades",
        "9 of spades",
        "10 of spades",
        "jack of spades",
        "queen of spades",
        "king of spades",
        "ace of spades",
    ];


    public function __construct()
    {
        parent::__construct();
    }

    public function getter($number)
    {
        return $this->representation[$number];
    }

    public function getname($number)
    {
        return $this->name[$number];
    }

    public function getAsString(): string
    {
        return $this->representation[$this->value - 1];
    }
}
