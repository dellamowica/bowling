<?php
use PHPUnit\Framework\TestCase;
use Bowling\Player;

class PlayerTest extends TestCase
{
    public function testNewPlayer()
    {
        $player = new Player("francis");
        $this->assertInstanceOf(Player::class, $player);
        $this->assertEquals(0, $player->getScore());
        $this->assertEquals("francis", $player->getName());
    }
}
