<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

use hotel\Models\ClientManager;
use hotel\Models\Client;
use hotel\Models\piscine;

include "../hotelManagerLyon_2023/src/config/config.php";


final class ManagerTest extends TestCase
{

    public function testShowPiscine()
    {
        $clientManager = new ClientManager();
        $piscines = $clientManager->getAllPiscine();

        $this->assertContainsOnlyInstancesOf(piscine::class, $piscines);
    }

    public function testShowClient()
    {
        $clientManager = new ClientManager();
        $piscines = $clientManager->getAllClient();

        $this->assertContainsOnlyInstancesOf(Client::class, $piscines);
    }
}