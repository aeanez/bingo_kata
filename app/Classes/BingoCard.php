<?php

namespace App\Classes;

use App\Utils;

class BingoCard {

    /**
     * The numbers contained in the card
     */
    public array $numbers = [];

    /**
     * The letters of every line
     */
    public array $lines = ['b','i','n','g','o'];

    /**
     * The max number of posibilities per line
     */
    public int $maxNumbersPerLine = 15;

    /**
     * The range to evaluate the generated number
     */
    public array $numbersRange = [];

    public function __construct()
    {
        $this->_generate();
    }

    private function _generate()
    {
        $this->numbers[2][] = "*";

        foreach($this->lines as $key => $line){

            if(!isset($this->numbers[$key])){
                $this->numbers[$key] = [];
            }

            $this->numbersRange = [
                ($this->maxNumbersPerLine * ($key + 1)) - $this->maxNumbersPerLine + 1, 
                ($this->maxNumbersPerLine * ($key + 1))
            ];
            
            while(count($this->numbers[$key]) < 5){
                $this->numbers[$key][] = Utils::generateRandomUniqueNumber($this->numbersRange, $this->numbers[$key]);
            }

        }
    }

}