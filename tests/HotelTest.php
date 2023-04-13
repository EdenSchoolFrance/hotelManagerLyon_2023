<?php

declare(strict_types=1);

namespace Hotel;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\InvalidArgumentException;
use Hotel\Models\HotelManager;
use Hotel\Models\Hotel;

include 'src/config/config.php';

final class HotelTest extends TestCase
{
    // public function testCanBeCreatedFromValidEmail(): void
    // {
    //     $string = 'user@example.com';

    //     $email = Email::fromString($string);

    //     $this->assertSame($string, $email->asString());
    // }

    protected $tm;

    public function initTestEnvironment()
    {
        $this->tm = new HotelManager;
    }

    public function testChambre()
    {
        $t = new HotelManager;

        $this->assertEquals("6435f3101e8f2", $t->findchambre("Chambre 213"));
    }

    public function testStockBarBoisson()
    {
        $t = new HotelManager;

        $this->assertEquals("1", $t->findbarboisson("1"));
    }
}
