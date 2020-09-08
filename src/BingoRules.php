<?php

class BingoRules
{
    const MIN_CARD_NUMBER = 1;
    const MAX_CARD_NUMBER = 75;

    /**
     * Min and max number values for every column
     * @var array
     */
    const BOUNDARIES = [
        'B' => [1, 15],
        'I' => [16, 30],
        'N' => [31, 45],
        'G' => [46, 60],
        'O' => [61, 75],
    ];
}