<?php 

class BingoCaller
{
    private $numbers = [];

    public function __construct()
    {
        // in the future we can customize and use other kind of Bingo here
        // we are using the US model this time
    }
    
    /**
     * Calling a random number for the bingo game
     * this value its unique and the values depend on
     * a range.
     * @return  int $number The called number.
     */
    public function callNumber(): int 
    {
        do {
            $number = rand(BingoRules::MIN_CARD_NUMBER, BingoRules::MAX_CARD_NUMBER);    
        } while(in_array($number, $this->numbers));
        
        $this->numbers[] = $number;
        
        return $number;
    }
    
    /**
     * Check if this number has been called before.
     * @param   int   $number The called number.
     * @return  bool
     */
    public function hasCalledNumber(int $number): bool
    {
        return in_array($number, $this->numbers);
    }
}
