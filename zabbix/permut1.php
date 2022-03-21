<?php
/*
Sample input:
1
4 1

Sample output:
3
 */

$n = 4;
$k = 1;

function numOfPerm($n, $k): int
{
    $tmp = [];

    if ($n == 0) {
        return 0;
    }

    if ($k == 0) {
        return 1;
    }

    $sum = 0;
    for ($i = 0; $i <= $k; $i++) {
        if ($i <= $n - 1)
            $sum += numOfPerm($n - 1, $k - $i);
    }

    $tmp[$n][$k] = $sum;

    return $sum;
}

echo numOfPerm($n, $k);



