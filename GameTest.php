<?php

use PHPUnit\Framework\TestCase;
use Bowling\Game;
use Bowling\Player;

/**
 * Class GameTest
 */
class GameTest extends TestCase
{
    public function testNewGame()
    {
        $game = new Game();
        $this->assertInstanceOf(Game::class, $game);
        $this->assertNull($game->getPlayers());
    }

    public function testAddPlayer()
    {
        $game = new Game();
        $player = new Player("bob");
        $game->addPlayer($player);
        $this->assertInstanceOf(Player::class, current($game->getPlayers()));
    }

    public function testPlay()
    {
        $game = new Game();
        $player = new Player("bob");
        $game->addPlayer($player);
        $game->play(8);
        $currentPlayer = $game->getCurrentPlayer();
        $this->assertEquals(8, $currentPlayer->getScore());
    }
}
