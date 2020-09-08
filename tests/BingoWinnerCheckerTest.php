<?php

use PHPUnit\Framework\TestCase;

class BingoWinnerCheckerTest extends TestCase
{
    public function testCheckerDeterminesNotWinnerYet()
    {
        $caller = new BingoCaller();

        $card = (new BingoCardGenerator())
            ->generate();

        // Let's call only 20 times (not a winner yet)
        for ($i = 1; $i <= 20; ++$i) {
            $caller->callNumber();
        }

        $this->assertFalse(
            BingoWinnerChecker::isWinner($caller, $card)
        );
    }

    public function testCheckerDeterminesAWinnerCorrectly()
    {
        $caller = new BingoCaller();
        $card = (new BingoCardGenerator())
            ->generate();

        // Let's call all of the numbers
        for ($i = 1; $i <= 75; ++$i) {
            $caller->callNumber();
        }

        $this->assertTrue(
            BingoWinnerChecker::isWinner($caller, $card)
        );
    }
}
