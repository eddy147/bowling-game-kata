<?php

namespace BowlingGameKata\Tests;

use BowlingGameKata\Game;
use PHPUnit\Framework\TestCase;

class GameTest extends TestCase
{
    public function testGutterGame()
    {
        $game = new Game();
        for ($i = 0; $i < 20; ++$i) {
            $game->roll(0);
        }
        $this->assertSame(0, $game->score());
    }
}