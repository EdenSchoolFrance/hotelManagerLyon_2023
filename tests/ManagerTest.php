<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

use Hotel\Models\HotelManager;
use Hotel\Models\Hotel;
use Hotel\Models\piscine;

define("SRC", '../src/');
define("CONTROLLERS", '../src/Controllers/');
define("MODELS", '../src/Models/');
define("VIEWS", '../src/Views/');

define('HOST', '127.0.0.1');
define('DATABASE', 'hotel_manager');
define('USER', 'root');
define('PASSWORD', '');


final class ManagerTest extends TestCase
{
    protected $bdd;

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
