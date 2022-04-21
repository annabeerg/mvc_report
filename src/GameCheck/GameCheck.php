<?php

namespace App\GameCheck;

class GameCheck
{
    public function getter($name)
    {
        $value = str_split($name);
        $holder = 1;
        foreach ($value as $letter) {
            if ($letter == "j") {
                $holder = 11;
            } elseif ($letter == "q") {
                $holder = 12;
            } elseif ($letter == "k") {
                $holder = 13;
            } elseif ($letter == "1") {
                $holder = 10;
            }
            $holder = $this->getters($letter, $holder);
        }
        return $holder;
    }

    public function getters($letter, $holder)
    {
        if ($letter == "2") {
            $holder = 2;
        } elseif ($letter == "3") {
            $holder = 3;
        } elseif ($letter == "4") {
            $holder = 4;
        } elseif ($letter == "5") {
            $holder = 5;
        } elseif ($letter == "6") {
            $holder = 6;
        } elseif ($letter == "7") {
            $holder = 7;
        } elseif ($letter == "8") {
            $holder = 8;
        } elseif ($letter == "9") {
            $holder = 9;
        }
        return $holder;
    }
}
