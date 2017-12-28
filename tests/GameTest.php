<?php

namespace BowlingGameKata\Tests;

use BowlingGameKata\Game;
use PHPUnit\Framework\TestCase;

class GameTest extends TestCase
{
    /**
     * @var \BowlingGameKata\Game
     */
    private $game;

    protected function setUp()
    {
        $this->game = new Game();
    }

    /**
     * @testdox Test case where every ball ends up in the gutter:no points!
     */
    public function testGutterGame()
    {
        $this->rollMany(20, 0);
        $this->assertSame(0, $this->game->score());
    }

    /**
     * @testdox Test if you throw only 1's.
     */
    public function testAllOnes()
    {
        $this->rollMany(20, 1);
        $this->assertSame(20, $this->game->score());
    }

    public function testOneSpare()
    {
        $this->rollSpare();
        $this->game->roll(3); //spare
        $this->rollMany(17, 0);
        $this->assertSame(16, $this->game->score());
    }

    /**
     * Throw $times, with $pins as result.
     *
     * @param int $times
     * @param int $pins
     */
    private function rollMany($times, $pins)
    {
        for ($i = 0; $i < $times; ++$i) {
            $this->game->roll($pins);
        }
    }

    private function rollSpare()
    {
        $this->game->roll(5);
        $this->game->roll(5);
    }
}