<?php

namespace App\Project;

use App\Entity\ClimateChange;
use App\Entity\ClimateSNI;
use App\Entity\BNP;
use App\Entity\Temperature;

/**
 * Class Data.
 */

class DataSNI
{

    public function one($csv) {
        $sni = new ClimateSNI();
        $sni->setField($csv[0]);
        $sni->setEight($csv[1]);
        $sni->setNine($csv[2]);
        $sni->setTen($csv[3]);
        $sni->setEleven($csv[4]);
        $sni->setTwelve($csv[5]);
        $sni->setThirteen($csv[6]);
        $sni->setFourteen($csv[7]);
        $sni->setFifteen($csv[8]);
        $sni->setSixteen($csv[9]);
        $sni->setSeventeen($csv[10]);

        return $sni;
    }
}
