<?php

declare(strict_types=1);
//use PHPUnit\Framework\InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Hotel\Models\TodoManager;
//use Todo\Email;
include 'src/config/config.php';

final class EmailTest extends TestCase
{
    protected $tm;


    // public function initTestEnvironment()
    // {
    //     // Cette methpde est executée avant chaque test
    //     $this->tm = new TodoManager();
    // }


    // public function testModels2()
    // {
    //     $this->assertEquals('17', $this->tm->find2('Dupont', 2));
    // }

    // public function testMock(): void
    // {
    //     // Créer une instance que l'on va pouvoir modifier
    //     $stub = $this->getMockBuilder(TodoManager::class)->getMock();
    //     // On remplace la méthode getLastPost() et on retourne ce que l'on veut
    //     $stub->method('find')->with(
    //         'doc1',
    //         2
    //     )->willReturn(['name' => 'doc1', 'id' => '2']);
    //     $this->assertSame(['name' => 'doc1', 'id' => '2'], $stub->find('doc1', 2));
    // }

    public function testMultiplication()
    {
        $this->assertEquals(4, 2 * 2);
    }
}
