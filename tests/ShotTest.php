<?php

namespace Bowling;

use PHPUnit\Framework\TestCase;
use Bowling\Shot;

class ShotTest extends TestCase
{
    function testCreateShot()
    {
        $shot = new Shot();
        $this->assertInstanceOf(Shot::class, $shot);
    }
}
