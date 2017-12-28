<?php

namespace BowlingGameKata\Tests;

use BowlingGameKata\Game;
use PHPUnit\Framework\TestCase;

class GameTest extends TestCase
{
    /** @var \BowlingGameKata\Game */
    private $game;

    protected function setUp()
    {
        $this->game = new Game();
    }

    public function testGutterGame()
    {
        for ($i = 0; $i < 20; ++$i) {
            $this->game->roll(0);
        }
        $this->assertSame(0, $this->game->getScore());
    }

    public function testAllOnes()
    {
        for ($i = 0; $i < 20; ++$i) {
            $this->game->roll(1);
        }
        $this->assertSame(20, $this->game->getScore());
    }
}