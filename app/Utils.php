<?php

namespace App;

Class Utils{

    /**
     * Allows to generate random numbers in a range 
     * with posible excluded numbers
     *
     * @param array $range
     * @param array $excludedNumbers
     * @return integer
     */
    public static function generateRandomUniqueNumber(array $range, array $excludedNumbers) : int
    {
        $numberGenerated = null;

        while($numberGenerated == null){

            $randomNumber = rand($range[0], $range[1]);

            if(!in_array($randomNumber, $excludedNumbers)){
                $numberGenerated = $randomNumber;
            }

        }

        return $numberGenerated;
    }

}