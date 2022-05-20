<?php

namespace App\Project;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Data.
 */

class DataTest extends TestCase
{
    /**
     * Tests class object is correct.
     */
    public function testCreateWithNoArguments()
    {
        $data = new Data();
        $this->assertInstanceOf("App\Project\Data", $data);
    }

    /**
     * Tests method sektor test if data is set and return object.
     * @param object
     */
    public function testsetandgetsektor()
    {
        $data = new Data();

        $array = array(
            0  => "1",
            1 => "2",
            2 => "3",
            3  => "4",
            4 => "5",
            5 => "6",
            6  => "7",
            7 => "8",
            8 => "9",
            9  => "10",
            10 => "11",
            11 => "12",
        );

        $this->assertIsObject($data->sektor($array));
    }

    /**
     * Tests method sektor test if data is set and return object.
     * @param object
     */
    public function testsetandgetsni()
    {
        $data = new Data();

        $array = array(
            0  => "1",
            1 => "2",
            2 => "3",
            3  => "4",
            4 => "5",
            5 => "6",
            6  => "7",
            7 => "8",
            8 => "9",
            9  => "10",
            10 => "11",
            11 => "12",
        );

        $this->assertIsObject($data->sni($array));
    }

    /**
     * Tests method sektor test if data is set and return object.
     * @param object
     */
    public function testsetandgetbnp()
    {
        $data = new Data();

        $array = array(
            0  => "1",
            1 => "2",
            2 => "3",
            3  => "4",
            4 => "5",
            5 => "6",
            6  => "7",
            7 => "8",
            8 => "9",
            9  => "10",
            10 => "11",
            11 => "12",
        );

        $this->assertIsObject($data->bnp($array));
    }

    /**
     * Tests method sektor test if data is set and return object.
     * @param object
     */
    public function testsetandgettemp()
    {
        $data = new Data();

        $array = array(
            0  => "1",
            1 => "2",
            2 => "3",
            3  => "4",
            4 => "5",
            5 => "6",
            6  => "7",
            7 => "8",
            8 => "9",
            9  => "10",
            10 => "11",
            11 => "12",
        );

        $this->assertIsObject($data->temp($array));
    }
}
