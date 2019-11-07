<?php
namespace Bowling;

class Player
{
    private int $score = 0;
    private string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getScore() : int
    {
        return $this->score;
    }

    public function getName() : string
    {
        return $this->name;
    }
}