<?php declare(strict_types=1);
namespace Tests;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\InvalidArgumentException;
use Hotel\Models\ClientManager;

include 'src/config/config.php';

final class Test extends TestCase
{

    public function testGet(){
        $t = new ClientManager();
        $this->assertEquals(
            "0123456789",
            $t->find(10, "Utilisateur")
        );
    }

}

