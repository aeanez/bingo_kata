<?php

namespace App\Classes;

use App\Utils;

class BingoCaller {
    /**
     * Contains the numbers called
     */
    public array $numbersCalled = [];

    /**
     * Contains the range of numbers
     */
    public array $numbersRange = [1,75];

    /**
     * Contains a random generated number
     */
    public int $randomNumber;

    /**
     * Contains the last number generated
     */
    public int $numberGenerated;

    /**
     * The numbers of calls made
     */
    public int $callsQuantity = 0;

    public function call() : int 
    {
        if(count($this->numbersCalled) >=75){
            throw new \Exception('There are no more numbers left');
        }

        $this->numberGenerated = Utils::generateRandomUniqueNumber($this->numbersRange, $this->numbersCalled);

        $this->numbersCalled[] = $this->numberGenerated;

        $this->callsQuantity++;

        return $this->numberGenerated;
    }
}