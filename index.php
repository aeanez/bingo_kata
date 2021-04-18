<?php 

require_once __DIR__ . "/vendor/autoload.php";

use App\Classes\BingoCaller;

$caller = new BingoCaller();

while(count($caller->numbersCalled) < 75){
    $caller->call();
}

echo "<pre>";
sort($caller->numbersCalled);
print_r($caller->numbersCalled);

?>