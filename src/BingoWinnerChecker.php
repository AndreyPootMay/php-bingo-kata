<?php

use Models\Card;

class BingoWinnerChecker
{
    /**
     * Check if the player is winner, checking the numbers in
     * the card and all the called numbers.
     * @param  BingoCaller  $caller
     * @param  Card         $card
     * @return bool
     */
    public static function isWinner(BingoCaller $caller, Card $card)
    {
        $cardNumber = $card->getNumbersInCard();

        foreach ($cardNumber as $cardNumber) {
            if (is_null($cardNumber)) // skip free value
                continue;

            if (!$caller->hasCalledNumber($cardNumber)) {
                return false;
            }
        }

        return true;
    }
}