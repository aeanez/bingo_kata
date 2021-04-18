<?php
require_once __DIR__ . '/vendor/autoload.php';

use App\Classes\BingoCard;
use App\Classes\BingoCaller;
use App\Classes\BingoChecker;

$continue = true;

while ($continue) {
    # A caller and a bingo card are created
    $caller = new BingoCaller();
    $card = new BingoCard();

    # This shows the generated card on the CLI
    foreach ($card->lines as $key => $line) {
        echo $line . " ";
        foreach ($card->numbers[$key] as $number) {
            echo $number . " ";
        }
        echo PHP_EOL;
    }

    # Checks the card in every call
    while (count($caller->numbersCalled) < 75) {
        $caller->call();
        if ((new BingoChecker($card, $caller))->check()) {
            echo "Bingo!!" . PHP_EOL;
            break;
        } else {
            echo ".";
        }
    }

    echo "{$caller->callsQuantity} Numbers were called before you called BINGO!!" . PHP_EOL;

    echo "Do you want to play again?  Press Enter to continue or type any word to finish: ";
    $handle = fopen ("php://stdin","r");
    $line = fgets($handle);
    if(trim($line) != ''){
        $continue = false;
    }

}
