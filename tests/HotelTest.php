<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;
// use PHPUnit\Framework\InvalidArgumentException;
use Hotel\Models\ClientManager;

include 'src/config/config.php';

final class HotelTest extends TestCase
{

    public function testBoissons()
    {
        $test = new ClientManager;

        $this->assertEquals("test", $test->recherche_client("643529540"));
    }

    public function testStockBarBoisson()
    {
        $t = new ClientManager;

        $this->assertEquals("1", $t->recherche_piscine("1"));
    }
}
