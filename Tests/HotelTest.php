<?php

namespace Hotel;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\InvalidArgumentException;
use Hotel\Models\HotelManager;
use Hotel\Models\Clients;

include 'src/config/config.php';

class HotelTest extends TestCase
{

    protected $hm;

    public function testGetClients()
    {
        $this->hm = new HotelManager();

        $clients = $this->hm->getClients();
    }
}
