<?php

namespace Bowling;

use PHPUnit\Framework\TestCase;
use Bowling\Turn;

class TurnTest extends TestCase
{
    function testCreateTurn()
    {
        $turn = new Turn();
        $this->assertInstanceOf(Turn::class, $turn);
    }
}
