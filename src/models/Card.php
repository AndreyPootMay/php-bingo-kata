<?php

namespace Models;

class Card
{
    private $grid;

    public function __construct($grid)
    {
        $this->grid = $grid;
    }

    /**
     * Checking if the column has a valid size and the boundaries are correct.
     * @return  bool
     */
    public function isValid(): bool
    {
        return $this->hasValidSize() && $this->respectBoundaries();
    }

    /**
     * Check if the column of the Card model had a valid size.
     * @return  bool
     */
    private function hasValidSize(): bool
    {
        foreach ($this->grid as $column) {
            if (sizeof($column) != 5) {
                return false;
            }

            return true;
        }
    }

    /**
     * Check if the columns respect the range of values.
     * @return  bool
     */
    private function respectBoundaries(): bool
    {
        return ($this->columnHasElementsBetween($this->grid['B'], 1, 15)
            && $this->columnHasElementsBetween($this->grid['I'], 16, 30)
            && $this->columnHasElementsBetween($this->grid['N'], 31, 45, true)
            && $this->columnHasElementsBetween($this->grid['G'], 46, 60)
            && $this->columnHasElementsBetween($this->grid['O'], 61, 75));
    }

    /**
     * @param  array     $column     Column to be checked.
     * @param  int       $min        Minimum range value.
     * @param  int       $max        Maximum range value.
     * @param  bool      $allowNull  Allow a null value in the iteration.
     * @return bool
     */
    private function columnHasElementsBetween(array $column, int $min, int $max, bool $allowNull = false): bool
    {
        foreach ($column as $number) {
            if ($allowNull && is_null($number))
                continue;

            if ($number < $min || $number > $max) {
                return false;
            }
        }

        return true;
    }

    /**
     * Check if the 'N' Column had an null value in the middle.
     * @return  bool
     */
    public function hasFreeSpaceInTheMiddle(): bool
    {
        return is_null($this->grid['N'][2]);
    }

    /**
     * Get all the values in the card.
     * @return  array
     */
    public function getNumbersInCard(): array
    {
        return array_merge(
            $this->grid['B'],
            $this->grid['I'],
            $this->grid['N'],
            $this->grid['G'],
            $this->grid['O']
        );
    }
}
