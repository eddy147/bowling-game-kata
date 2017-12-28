<?php

namespace BowlingGameKata;

class Game
{
    /**
     * @var array
     */
    private $rolls = array();

    /**
     * @var int
     */
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
        for ($frameIndex = 0; $frameIndex < 10; ++$frameIndex) {
            if ($this->isSpare($frameIndex)) {
                $score += 10 + $this->rolls[$i + 2];
                $i += 2;
            } else {
                $score += $this->rolls[$i] + $this->rolls[$i + 1];
                $i += 2;
            }
        }

        return $score;
    }

    /**
     * @param $frameIndex
     *
     * @return bool
     */
    private function isSpare($frameIndex)
    {
        return $this->rolls[$frameIndex] + $this->rolls[$frameIndex + 1] === 10;
    }
}