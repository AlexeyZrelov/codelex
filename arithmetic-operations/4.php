<?php
//$fact = gmp_fact(10);
//echo $fact . PHP_EOL;
$n = 10;
//$factorial = 1;
//for ($i = 1; $i <= $n; $i++) {
//    $factorial *= $i;
//}
//echo $factorial . PHP_EOL;

echo array_product(range(1, $n)) . PHP_EOL;
