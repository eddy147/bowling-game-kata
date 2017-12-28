<?php

namespace BowlingGameKata;

class Game
{
    /**
     * @var int
     */
    private $rolls = array();
    private $currentRoll = 0;

    public function __construct()
    {
        for ($i = 0; $i < 21; ++$i) {
            $this->rolls[$i] = 0;
        }
    }

    /**
     * @param int $pins
     */
    public function roll($pins)
    {
        $this->rolls[$this->currentRoll++] = $pins;
    }

    /**
     * @return int
     */
    public function score()
    {
        $score = 0;
        $i = 0;
        for ($frame = 0; $frame < 10; ++$frame) {
            if ($this->rolls[$i] + $this->rolls[$i + 1] === 10) { //spare
                $score += 10 + $this->rolls[$i + 2];
                $i += 2;
            } else {
                $score += $this->rolls[$i] + $this->rolls[$i + 1];
                $i += 2;
            }
        }

        return $score;
    }
}