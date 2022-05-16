<?php

namespace App\Project;

/**
 * Class Helpers
 */

class Helper
{
    /**
     * Metod helper
     * @return string
     */
    public function helper(
        mixed $pointstwo,
        mixed $pointsone,
        string $winner,
        Hand $game
    ): string {
        if ($pointstwo > $pointsone and $pointstwo < 21) {
            $winner = "Computer won!";
        } elseif ($pointstwo < $pointsone) {
            if ($pointstwo <= 17) {
                $gamer2 = $game->add();
                $pointstwos = new GameChecker();
                $pointstwototal = $pointstwos ->getter($gamer2);
                $pointstwo = $pointstwo + $pointstwototal;
            }
            if ($pointstwo > $pointsone and $pointstwo < 21) {
                $winner = "Computer won!";
            } elseif ($pointstwo == $pointsone) {
                $winner = "Computer won!";
            } elseif ($pointsone > $pointstwo) {
                $winner = "You won!";
            }
        }
        return $winner;
    }

    /**
     * Metod helpertwo
     * Continues metod helper
     * @return string
     */
    public function helpertwo(
        mixed $pointstwo,
        mixed $pointsone,
        string $winner,
    ): string {
        if ($pointsone == 21) {
            $winner = "You won!";
        } elseif ($pointstwo == 21) {
            $winner = "Computer won!";
        }
        if ($pointstwo == 21 and $pointsone == 21) {
            $winner = "Computer won!";
        } elseif ($pointsone > 21) {
            $winner = "Computer won!";
        } elseif ($pointstwo > 21) {
            $winner = "You won!";
        }
        if ($pointsone > 21 and $pointstwo > 21) {
            $winner = "Computer won!";
        }
        return $winner;
    }
}
