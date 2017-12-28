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
        $frameIndex = 0;
        for ($frame = 0; $frame < 10; ++$frame) {
            if ($this->isStrike($frameIndex)) { //strike
                $score = $this->strikeBonus($score, $frameIndex);
                $frameIndex++;
            } elseif ($this->isSpare($frameIndex)) {
                $score = $this->spareBonus($frameIndex, $score);
                $frameIndex += 2;
            } else {
                $score = $this->sumOfBallsInFrame($frameIndex, $score);
                $frameIndex += 2;
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

    /**
     * @param $frameIndex
     *
     * @return bool
     */
    private function isStrike($frameIndex)
    {
        return $this->rolls[$frameIndex] === 10;
    }

    /**
     * @param int $frameIndex
     * @param int $score
     *
     * @return int
     */
    private function sumOfBallsInFrame($frameIndex, $score)
    {
        $score += $this->rolls[$frameIndex] + $this->rolls[$frameIndex + 1];

        return $score;
    }

    /**
     * @param int $frameIndex
     * @param int $score
     *
     * @return int
     */
    private function spareBonus($frameIndex, $score)
    {
        $score += 10 + $this->rolls[$frameIndex + 2];

        return $score;
    }

    /**
     * @param int $score
     * @param int $frameIndex
     *
     * @return int
     */
    private function strikeBonus($score, $frameIndex)
    {
        $score += 10;
        $score += $this->rolls[$frameIndex + 1];
        $score += $this->rolls[$frameIndex + 2];

        return $score;
    }
}