<?php

$numbers = [
    1789, 2035, 1899, 1456, 2013,
    1458, 2458, 1254, 1472, 2365,
    1456, 2265, 1457, 2456
];

echo "Enter the value to search for: ";
foreach ($numbers as $val) {
    echo "$val ";
}

//todo check if an array contains a value user entered
$inArr = readline("Enter a number: ");
$ind = $inArr ?? null;
if (in_array($ind, $numbers)) {
    echo "Yes" . PHP_EOL;
} else {
    echo "No" . PHP_EOL;
}