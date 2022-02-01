<?php

$carts = [
    ['item' => 'A', 'qty' => 2, 'price' => 10],
    ['item' => 'B', 'qty' => 3, 'price' => 20],
    ['item' => 'C', 'qty' => 5, 'price' => 30]
];

$total = array_reduce(
    $carts,
    function ($prev, $item) {
        return $prev + $item['qty'] * $item['price'];
    }
);

echo $total . PHP_EOL; // 230