<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

use Hotel\Models\HotelManager;
use Hotel\Models\Hotel;
use Hotel\Models\piscine;

include "../hotelManagerLyon_2023/src/config/config.php";


final class ManagerTest extends TestCase
{

    public function testShowPiscine()
    {
        $hotelManager = new HotelManager();
        $piscines = $hotelManager->showPiscine();

        $this->assertContainsOnlyInstancesOf(piscine::class, $piscines);
    }

    public function testShowAll()
    {
        $hotelManager = new HotelManager();
        $piscines = $hotelManager->show();

        $this->assertContainsOnlyInstancesOf(hotel::class, $piscines);
    }
}
