<?php

use Models\Card;

class BingoCardGenerator
{
    private $grid = [
        'B' => [],
        'I' => [],
        'N' => [],
        'G' => [],
        'O' => []
    ];

    /**
     * Generate a new Card model with a new grid with values.
     * @return Card
     */
    public function generate(): Card
    {
        foreach ($this->grid as $columnLetter => $column) {
            $this->grid[$columnLetter] =
                $this->generateColumnWithBoundaries(
                    BingoRules::BOUNDARIES[$columnLetter][0],
                    BingoRules::BOUNDARIES[$columnLetter][1]
                );
        }

        // Free space at the middle of the card
        $this->grid['N'][2] = null;

        return new Card($this->grid);
    }

    /**
     * @param   int    $min  Minimum Bingo column limit.
     * @param   int    $max  Maximum Bingo column limit.
     * @return  array  $column Generate an Bingo column with unique values.
     */
    public function generateColumnWithBoundaries(int $min, int $max): array
    {
        $column = [];

        while (sizeof($column) < 5) {
            $number = rand($min, $max);

            if (!in_array($number, $column)) {
                $column[] = $number;
            }
        }

        return $column;
    }
}
