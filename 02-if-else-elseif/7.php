<?php
//$number = 10;
//$number = 70;
$number = 150;
switch ($number) {
    case $number < 50:
        echo "low" . PHP_EOL;
        break;
    case ($number > 50 && $number < 100):
        echo "medium" . PHP_EOL;
        break;
    case $number > 100:
        echo "high" . PHP_EOL;
        break;
}