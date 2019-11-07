<?php
namespace Bowling;

class Game
{
    private ?array $players = null;
    private int $currentPlayerIndex = 0;

    public function getPlayers() : ?array
    {
        return $this->players;
    }

    public function addPlayer(Player $player) : Game
    {
        $this->players[] = $player;
        return $this;
    }

    public function getCurrentPlayer() : Player
    {
        return $this->players[$this->currentPlayerIndex];
    }

    public function play(int $score)
    {
        $player = $this->getCurrentPlayer();
        return $player->getScore();
    }
}