<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\InvalidArgumentException;
use Hotel\Models\HotelManager;


include 'src/config/config.php';

final class HotelTest extends TestCase
{


    protected $tm;

    public function initTestEnvironment()
    {
        $this->tm = new HotelManager;
    }

    public function testChambre()
    {
        $t = new HotelManager;

        $this->assertEquals("6435f3101e8f2", $t->findchambre("Chambre 213"));
    }

    public function testStockBarBoisson()
    {
        $t = new HotelManager;

        $this->assertEquals("1", $t->findbarboisson("1"));
    }
}
