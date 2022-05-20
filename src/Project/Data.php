<?php

namespace App\Project;

use App\Entity\ClimateChange;
use App\Entity\ClimateSNI;
use App\Entity\BNP;
use App\Entity\Temperature;

/**
 * Class Data.
 */

class Data
{
    /**
     * Functions to set values to object ClimateSNI before returning object
     * to add to table ClimateSNI in databases.
     * @param array<int, String> $csv
     * /** @return ClimateSNI */
    public function sektor($csv): ClimateSNI
    {
        $sektor = new ClimateSNI();
        $sektor->setField($csv[0]);
        $sektor->setEight($csv[1]);
        $sektor->setNine($csv[2]);
        $sektor->setTen($csv[3]);
        $sektor->setEleven($csv[4]);
        $sektor->setTwelve($csv[5]);
        $sektor->setThirteen($csv[6]);
        $sektor->setFourteen($csv[7]);
        $sektor->setFifteen($csv[8]);
        $sektor->setSixteen($csv[9]);
        $sektor->setSeventeen($csv[10]);

        return $sektor;
    }

    /**
     * Functions to set values to object CLimateChange before returning object
    * to add to table ClimateChange in databases.
    * @param array<int, String> $csv
    * /** @return ClimateChange */
    public function sni(array $csv): ClimateChange
    {
        $sni = new ClimateChange();
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

    /**
     * Functions to set values to object  BNP before returning object
    * to add to table BNP in databases.
    * @param array<int, String> $csv
    * /** @return  BNP */
    public function bnp(array $csv): BNP
    {
        $bnp = new BNP();
        $bnp->setField($csv[0]);
        $bnp->setEight($csv[1]);
        $bnp->setNine($csv[2]);
        $bnp->setTen($csv[3]);
        $bnp->setEleven($csv[4]);
        $bnp->setTwelve($csv[5]);
        $bnp->setThirteen($csv[6]);
        $bnp->setFourteen($csv[7]);
        $bnp->setFifteen($csv[8]);
        $bnp->setSixteen($csv[9]);
        $bnp->setSeventeen($csv[10]);

        return $bnp;
    }
    /**
     * Functions to set values to object Temperature before returning object
    * to add to table Temperature in databases.
    * @param array<int, String> $csv
    * /** @return Temperature */
    public function temp(array $csv): Temperature
    {
        $temp = new Temperature();
        $temp->setYear($csv[0]);
        $temp->setMiddleTemp($csv[1]);

        return $temp;
    }
}
