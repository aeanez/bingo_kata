<?php 

require_once __DIR__ . "/vendor/autoload.php";

use App\Classes\BingoCard;
use App\Classes\BingoCaller;

# A caller and a bingo card are created
$caller = new BingoCaller();
$card = new BingoCard();

# This shows the generated card on the CLI
foreach($card->lines as $key => $line){
    echo $line . " ";
    foreach($card->numbers[$key] as $number){
        echo $number . " ";
    }
    echo PHP_EOL;
}

while(count($caller->numbersCalled) < 75){
    $caller->call();
}

echo "<pre>";
sort($caller->numbersCalled);
print_r($caller->numbersCalled);

?>