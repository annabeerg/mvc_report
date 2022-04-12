<?php

namespace App\Card;

class GameCheck
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


    public function getter($name)
    {
        if ($name == $this->representation[0] or $name == $this->representation[13] or $name == $this->representation[26] or $name == $this->representation[39]){
        return 2;
        } elseif ($name == $this->representation[1] or $name == $this->representation[14] or $name == $this->representation[27] or $name == $this->representation[40]){
            return 3;
        } elseif ($name == $this->representation[2] or $name == $this->representation[15] or $name == $this->representation[28] or $name == $this->representation[41]){
            return 4;
        } elseif ($name == $this->representation[3] or $name == $this->representation[16] or $name == $this->representation[29] or $name == $this->representation[42]){
            return 5;
        } elseif ($name == $this->representation[4] or $name == $this->representation[17] or $name == $this->representation[30] or $name == $this->representation[43]){
            return 6;
        } elseif ($name == $this->representation[5] or $name == $this->representation[18] or $name == $this->representation[31] or $name == $this->representation[44]){
            return 7;
        } elseif ($name == $this->representation[6] or $name == $this->representation[19] or $name == $this->representation[32] or $name == $this->representation[45]){
            return 8;
        } elseif ($name == $this->representation[7] or $name == $this->representation[20] or $name == $this->representation[33] or $name == $this->representation[46]){
            return 9;
        } elseif ($name == $this->representation[8] or $name == $this->representation[21] or $name == $this->representation[34] or $name == $this->representation[47]){
            return 10;
        } elseif ($name == $this->representation[9] or $name == $this->representation[22] or $name == $this->representation[35] or $name == $this->representation[48]){
            return 11;
        } elseif ($name == $this->representation[10] or $name == $this->representation[23] or $name == $this->representation[36] or $name == $this->representation[49]){
            return 12;
        } elseif ($name == $this->representation[11] or $name == $this->representation[24] or $name == $this->representation[37] or $name == $this->representation[50]){
            return 13;
        } elseif ($name == $this->representation[12] or $name == $this->representation[25] or $name == $this->representation[38] or $name == $this->representation[51]){
            return 1;
        }
    }
}
