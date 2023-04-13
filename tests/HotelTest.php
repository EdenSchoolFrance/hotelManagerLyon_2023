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

        $this->assertEquals($test->recherche_client("643529540"), "test");
    }

    public function testStockBarBoisson()
    {
        $t = new ClientManager;

        $this->assertEquals($t->recherche_piscine("789"), "name_piscine");
    }
}
