<?php

namespace Bowling;

use PHPUnit\Framework\TestCase;

class ShotTest extends TestCase
{
    function testCreateShot()
    {
        $shot = new Shot(0);
        $this->assertInstanceOf(Shot::class, $shot);

        $this->assertEquals(0, $shot->getValue());

        $secondShot = new Shot(5);
        $this->assertEquals(5, $secondShot->getValue());

        $strikeShot = new Shot(10);
        $this->assertEquals(10, $strikeShot->getValue());

        $this->expectException(ShotBeyondLimitException::class);
        new Shot(12);
    }
}
