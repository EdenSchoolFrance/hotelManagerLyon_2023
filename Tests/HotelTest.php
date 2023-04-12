<?php
namespace Hotel;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\InvalidArgumentException;
use Hotel\Models\HotelManager;
use Hotel\Models\Hotel;
use Hotel\Models\ConstructorManager;

include 'src/config/config.php';

class HotelTest extends TestCase{

    protected $hm;
    protected $cm;

    public function testGetClients(){
       $this->hm = new HotelManager();
        $this->cm = new ConstructorManager();

       
        $clients = $this->hm->getClients();
        $this->assertIsArray($clients);
        $this->assertGreaterThan(0, count($clients));
        var_dump($clients);
    }

}
