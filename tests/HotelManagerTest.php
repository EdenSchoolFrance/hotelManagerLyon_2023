<?php

use PHPUnit\Framework\TestCase;
use Hotel\Tests\HotelSQLTest;

class HotelManagerTest extends TestCase
{
    private $manager;

    protected function setUp(): void
    {
        $this->manager = new HotelSQLTest();
    }

    public function testGetAllClientReturnsArray()
    {
        $result = $this->manager->getAll_client();
        $this->assertIsArray($result);
    }

    public function testGetAllSalleReturnsArray()
    {
        $result = $this->manager->getAll_salle();
        $this->assertIsArray($result);
    }

    public function testInsertReservationAddsToDatabase()
    {
        // Vérifier que le client existe
        $client = $this->manager->get_client(1);
        $this->assertNotEmpty($client);

        // Vérifier que la salle existe
        $salle = $this->manager->get_salle(2);
        $this->assertNotEmpty($salle);

        // Ajouter une réservation
        $result = $this->manager->insert_reservation(1, 2, '2023-05-01', '2023-05-07', 'booked');
        $this->assertTrue($result);
    }

    public function testInsertClientAddsToDatabase()
    {
        $result = $this->manager->insert_client('Doe', 'John', 'johndoe@example.com', 'password');
        // Vérifier que l'insertion a réussi en vérifiant que l'ID du client est supérieur à zéro
        $this->assertGreaterThan(0, $result);
    }

    public function testUpdateClientUpdatesDatabase()
    {
        $id = 1;
        $nom = 'Doe';
        $prenom = 'John';
        $email = 'johndoe@example.com';
        $password = 'newpassword';

        $this->manager->update_client($nom, $prenom, $email, $password, $id);

        $client = $this->manager->get_client($id);
        $this->assertEquals($nom, $client[0]->nom_client);
        $this->assertEquals($prenom, $client[0]->prenom_client);
        $this->assertEquals($email, $client[0]->email_client);
        // Ajouter des guillemets autour de la valeur de chaîne pour le mot de passe mis à jour
        $this->assertEquals("'" . $password . "'", $client[0]->mdp_client);
    }

    public function testGetClientReturnsArray()
    {
        $id = 1;
        $result = $this->manager->get_client($id);
        $this->assertIsArray($result);
    }

    public function testGetReservationsClientReturnsArray()
    {
        $id = 1;
        $result = $this->manager->get_reservations_client($id);
        $this->assertIsArray($result);
    }

    public function testDeleteClientDeletesFromDatabase()
    {
        $id = 1;

        $this->manager->delete_client($id);

        $client = $this->manager->get_client($id);
        $this->assertEmpty($client);
    }
}
?>