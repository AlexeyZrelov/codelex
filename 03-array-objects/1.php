<?php
$arr = [1, 2, 3];
//$arr = [5, 7, 9];
//function sum($carry, $item)
//{
//    $carry += $item;
//    return $carry;
//}
//echo array_reduce($arr, "sum") . PHP_EOL;

$total = array_reduce($arr,
    function($a, $b) {
        return $a + $b;
});
echo $total . PHP_EOL;