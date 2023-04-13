<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

use Hotel\Models\HotelManager;
use Hotel\Models\Clients;
use Hotel\Models\MenusRestaurants;
use Hotel\Models\Piscines;

include "../hotelManagerLyon_2023/src/config/config.php";


final class HotelTest extends TestCase
{
    
    public function testShowPiscines()
    {
        $hotelManager = new HotelManager();
        $piscines = $hotelManager->getPiscines();
        $this->assertContainsOnlyInstancesOf(Piscines::class, $piscines);
    }

    public function testShowMenus()
    {
        $hotelManager = new HotelManager();
        $menus = $hotelManager->getMenus();
        $this->assertContainsOnlyInstancesOf(MenusRestaurants::class, $menus);
    }
    
}