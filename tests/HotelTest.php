<?php declare(strict_types=1);
namespace Tests;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\InvalidArgumentException;
use Hotel\Models\ClientManager;

include 'src/config/config.php';

final class Test extends TestCase
{

    public function testGet(){ // Effectue le test d'une requête GET
        $t = new ClientManager();
        $this->assertEquals(
            "0123456789",
            $t->find(10, "Utilisateur")
        );
    }

    public function testInsert(){ // Effectue le test d'une requête INSERT
        $t = new ClientManager();
        $this->assertEquals(
            true,
            $t->insert("nom", "prenom", "email@email.com", "0123456789")
        );
    }

    public function testDelete(){ // Effectue le test d'une requête DELETE
        $t = new ClientManager();
        $this->assertEquals(
            true,
            $t->delete("nom", "prenom", "0123456789")
        );
    }

}

