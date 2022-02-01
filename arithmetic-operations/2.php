<?php
$CheckOddEven = 10;
//$str = 'bye!';
switch ($CheckOddEven) {
    case (($CheckOddEven % 2) != 0):
        echo "Odd Number" . PHP_EOL . "bye!" . PHP_EOL;
        break;
    case (($CheckOddEven % 2) == 0):
        echo "Even Number" . PHP_EOL . "bye!" . PHP_EOL;
        break;
    default:
        echo "bye!" . PHP_EOL;
}