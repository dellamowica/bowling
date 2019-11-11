<?php

namespace Bowling;

use PHPUnit\Framework\TestCase;

class TurnTest extends TestCase
{
    function testCreateTurn()
    {
        $turn = new Turn();
        $this->assertInstanceOf(Turn::class, $turn);
    }

    function testRegularTurn()
    {
        $turn = new Turn();
        $this->assertEquals(0, $turn->getScore());
        $this->assertFalse($turn->isSpare());
        $this->assertFalse($turn->isStrike());

        $turn->addShot(new Shot(2));
        $this->assertEquals(2, $turn->getScore());
        $this->assertFalse($turn->isSpare());
        $this->assertFalse($turn->isStrike());

        $turn->addShot(new Shot(2));
        $this->assertEquals(4, $turn->getScore());
        $this->assertFalse($turn->isSpare());
        $this->assertFalse($turn->isStrike());

        $this->expectException(TooMuchShotsException::class);
        $turn->addShot(new Shot(4));
    }

    function testOverScoredTurn()
    {
        $turn = new Turn();

        $turn->addShot(new Shot(7));

        $this->expectException(InvalidTurnScoreException::class);
        $turn->addShot(new Shot(8));

        //Testing that the previous value was ignored
        $this->assertEquals(7, $turn->getScore());
    }

    function testStrike()
    {
        $turn = new Turn();

        $turn->addShot(new Shot(10));
        $this->assertEquals(10, $turn->getScore());
        $this->assertTrue($turn->isStrike());

        $this->expectException(TooMuchShotsException::class);
        $turn->addShot(new Shot(8));
    }

    function testSpare()
    {
        $turn = new Turn();

        $turn->addShot(new Shot(9));
        $turn->addShot(new Shot(1));
        $this->assertEquals(10, $turn->getScore());
        $this->assertTrue($turn->isSpare());
        $this->assertFalse($turn->isStrike());
    }
}
