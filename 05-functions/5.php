<?php
$fruits = [
    1 => ["apple", 10],
    2 => ["cherry", 20],
    3 => ["lemon", 30],
    4 => ["kiwi", 5],
    5 => ["plum", 7]
];
$i = readline("Enter a number [1 - 5]: ");
$price = 0;
$fruits1 = [];
function calc($arr, $i): string
{
    $cost = [1, 2];
    $price = ((isset($arr[$i][1])) && $arr[$i][1] > 10) ? $cost[1]: $cost[0];
//    $arr[$i][] = $price;
    return "$i : {$arr[$i][0]} - {$arr[$i][1]}kg price = $price EUR";
}

echo calc($fruits, $i) . PHP_EOL;
echo '===============================' . PHP_EOL;
$fruits1[] = calc($fruits, $i);
//print_r($fruits1);
//foreach ($fruits as $j => $v)
//{
//    echo "$j : $v[0] - $v[1]kg price = $price EUR" . PHP_EOL;
//}
foreach ($fruits1 as $v)
{
    echo $v . PHP_EOL;
}