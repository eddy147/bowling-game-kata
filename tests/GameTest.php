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

    /**
     * @testdox Test we get extra points when we have a spare.
     */
    public function testOneSpare()
    {
        $this->rollSpare();
        $this->game->roll(3); //spare
        $this->rollMany(17, 0);
        $this->assertSame(16, $this->game->score());
    }

    /**
     * @testdox Test we get extra points for throwing a strike.
     */
    public function testOneStrike()
    {
        $this->game->roll(10);
        $this->game->roll(3);
        $this->game->roll(4);
        $this->rollMany(16, 0);

        $this->assertEquals(24, $this->game->score());
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