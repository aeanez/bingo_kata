<?php

namespace App\Classes;

class BingoChecker {
    /**
     *  Dependecy of BingoCard Class
     */
    public BingoCard $card;

    /**
     *  Dependecy of BingoCaller Class
     */
    public BingoCaller $caller;

    /**
     * The number of confirmations in the card
     */
    public int $confirmations = 0;

    public function __construct(BingoCard $card, BingoCaller $caller){
        $this->card = $card;
        $this->caller = $caller;
    }

    /**
     * Evaluates every number called and 
     * check if all the card numbers were called
     *
     * @return boolean
     */
    public function check() : bool
    {   
        foreach($this->caller->numbersCalled as $key => $number)
        {
            
            foreach ($this->card->numbers as $key => $cardLine) 
            {
                
                if(in_array($number, $cardLine)){
                    $this->confirmations++;
                    continue 2;
                }

            }
        }

        if($this->confirmations<24)
        {
            return false;
        }

        return true;
    }

}