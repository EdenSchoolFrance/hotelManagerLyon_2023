<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

use Hotel\Models\HotelManager;
use Hotel\Models\Hotel;
use Hotel\Models\piscine;
use Hotel\Models\menu;

include "../hotelManagerLyon_2023/src/config/config.php";


final class ManagerTest extends TestCase
{

    //test to show all piscine

    public function testShowPiscine()
    {
        $hotelManager = new HotelManager();
        $piscines = $hotelManager->showPiscine();

        $this->assertContainsOnlyInstancesOf(piscine::class, $piscines);
    }

    //test to show all client

    public function testShowAll()
    {
        $hotelManager = new HotelManager();
        $showAll = $hotelManager->show();

        $this->assertContainsOnlyInstancesOf(hotel::class, $showAll);
    }

    public function testshowMenu()
    {
        $hotelManager = new HotelManager();
        $showMenu = $hotelManager->showMenu();

        $this->assertContainsOnlyInstancesOf(menu::class, $showMenu);
    }
}
