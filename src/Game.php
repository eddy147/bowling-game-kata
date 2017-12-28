<?php

namespace BowlingGameKata;

class Game
{
    /**
     * @var int
     */
    private $score = 0;

    /**
     * @param int $pins
     */
    public function roll($pins)
    {
        $this->score += $pins;
    }

    /**
     * @return int
     */
    public function getScore()
    {
        return $this->score;
    }
}