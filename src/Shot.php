<?php


namespace Bowling;

/**
 * Class Shot
 * @package Bowling
 */
class Shot
{
    private int $value;

    /**
     * Shot constructor.
     * @param int $value
     * @throws ShotBeyondLimitException
     */
    public function __construct(int $value)
    {
        if($value > 10) {
            throw new ShotBeyondLimitException();
        }
        $this->value = $value;
    }

    public function getValue(): int
    {
        return $this->value;
    }
}