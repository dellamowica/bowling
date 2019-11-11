<?php


namespace Bowling;


class Turn
{
    private array $shots = [];

    /**
     * @param Shot $shot
     * @return Turn
     * @throws InvalidTurnScoreException
     * @throws TooMuchShotsException
     */
    public function addShot(Shot $shot): Turn
    {
        $this->checkShotCount();
        $this->checkScoreValidity($shot);
        $this->shots[]= $shot;
        return $this;
    }

    /**
     * @param Shot $shot
     * @throws InvalidTurnScoreException
     */
    private function checkScoreValidity(Shot $shot)
    {
        if(($this->getScore() + $shot->getValue()) > 10) {
            throw new InvalidTurnScoreException();
        }
    }

    /**
     * @throws TooMuchShotsException
     */
    private function checkShotCount()
    {
        if($this->isStrike() || count($this->shots) == 2) {
            throw new TooMuchShotsException();
        }
    }

    /**
     * @return int
     */
    public function getScore(): int
    {
        $score = 0;
        foreach ($this->shots as $shot) {
            $score+= $shot->getValue();
        }
        return $score;
    }

    /**
     * @return bool
     */
    public function isSpare(): bool
    {
        if(count($this->shots) < 2) {
            return false;
        }
        return $this->getScore() === 10;
    }

    /**
     * @return bool
     */
    public function isStrike(): bool
    {
        return count($this->shots) === 1 && $this->getScore() === 10;
    }
}