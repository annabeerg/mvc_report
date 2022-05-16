<?php

namespace App\Project;

/**
 * Class GameCheck
 */

class GameChecker
{
    /**
     * Method getter.
     * Checks if variable name to set value holder.
     * @return int
     */
    public function getter(string $name): int
    {
        $value = str_split($name);
        $holder = 1;
        foreach ($value as $letter) {
            if ($letter == "j") {
                $holder = 11;
                return $holder;
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

    /**
     * Method getters.
     * Checks if variable name to set value holder.
     * @return int
     */
    public function getters(string $letter, int $holder): int
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

    /**
     * Method changer
     * chnges hand to new values depending on names.
     * @return array
     */
    public function changer($hand): array
    {
        $lister = [];
        foreach ($hand as $value) {
            $lister[] = $this->change($value);
        }
        return $lister;
    }

    /**
     * Method getter.
     * Checks if variable name to set value holder.
     * @return int
     */
    public function change(string $name): string
    {
        $value = str_split($name);
        $holder = "";
        foreach ($value as $letter) {
            if ($letter == "j") {
                $holder = "J";
                return $holder;
            } elseif ($letter == "q") {
                $holder = "Q";
            } elseif ($letter == "k") {
                $holder = "K";
            } elseif ($letter == "1") {
                $holder = "10";
            }
            $holder = $this->changetwo($letter, $holder);
        }
        return $holder;
    }

    /**
     * Method getters.
     * Checks if variable name to set value holder.
     * @return int
     */
    public function changetwo(string $letter, string $holder): string
    {
        if ($letter == "2") {
            $holder = "2";
        } elseif ($letter == "3") {
            $holder = "3";
        } elseif ($letter == "4") {
            $holder = "4";
        } elseif ($letter == "5") {
            $holder = "5";
        } elseif ($letter == "6") {
            $holder = "6";
        } elseif ($letter == "7") {
            $holder = "7";
        } elseif ($letter == "8") {
            $holder = "8";
        } elseif ($letter == "9") {
            $holder = "9";
        }
        return $holder;
    }

    /**
     * Method changer
     * chnges hand to new values depending on names.
     * @return array
     */
    public function advancedchanger($hand): array
    {
        $lister = [];
        foreach ($hand as $value) {
            $lister[] = $this->adchange($value);
        }
        return $lister;
    }

    /**
     * Method getter.
     * Checks if variable name to set value holder.
     * @return int
     */
    public function adchange(string $name): string
    {
        $name = str_replace("images/cards/", "", $name);
        $value = str_split($name);
        $holder = "";
        foreach ($value as $letter) {
            if ($letter == "j") {
                $holder = "J";
                $holder = $this->name($holder, $value);
                return $holder;
            } elseif ($letter == "q") {
                $holder = "Q";
                $holder = $this->name($holder, $value);
            } elseif ($letter == "k") {
                $holder = "K";
                $holder = $this->name($holder, $value);
            } elseif ($letter == "1") {
                $holder = "10";
                $holder = $this->name($holder, $value);
            }
            $holder = $this->adchangetwo($letter, $holder, $value);
        }
        return $holder;
    }

    /**
     * Method getters.
     * Checks if variable name to set value holder.
     * @return int
     */
    public function adchangetwo(string $letter, string $holder, array $value): string
    {
        if ($letter == "2") {
            $holder = "2";
            $holder = $this->name($holder, $value);
        } elseif ($letter == "3") {
            $holder = "3";
            $holder = $this->name($holder, $value);
        } elseif ($letter == "4") {
            $holder = "4";
            $holder = $this->name($holder, $value);
        } elseif ($letter == "5") {
            $holder = "5";
            $holder = $this->name($holder, $value);
        } elseif ($letter == "6") {
            $holder = "6";
            $holder = $this->name($holder, $value);
        } elseif ($letter == "7") {
            $holder = "7";
            $holder = $this->name($holder, $value);
        } elseif ($letter == "8") {
            $holder = "8";
            $holder = $this->name($holder, $value);
        } elseif ($letter == "9") {
            $holder = "9";
            $holder = $this->name($holder, $value);
        }
        if ($holder === "") {
            $holder = "A";
            $holder = $this->name($holder, $value);
        }
        return $holder;
    }

    /**
     * Method getters.
     * Checks if variable name to set value holder.
     * @return int
     */
    public function name(string $holder, array $value): string
    {
        if (array_search('h', $value)) {
            $current = array_search('h', $value);
            if ($value[$current+1] === "e") {
                $holder .= "h";
            }
        }
        if (array_search('d', $value)) {
            $current = array_search('d', $value);
            if ($value[$current+1] === "i") {
                $holder .= "d";
            }
        }
        if (array_search('c', $value)) {
            $current = array_search('c', $value);
            if ($value[$current+1] === "l") {
                $holder .= "c";
            }
        }
        if (array_search('s', $value)) {
            $current = array_search('s', $value);
            if ($value[$current+1] === "p") {
                $holder .= "s";
            }
        }
        return $holder;
    }
}
