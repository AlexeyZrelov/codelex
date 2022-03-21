<?php
/*
3
2
acm
ibm
3
acm
malform
mouse
2
ok
ok
*/

$N = [
    ['acm', 'ibm'],
    ['acm', 'malform', 'mouse'],
    ['ok', 'ok']
];

foreach ($N as $j => $k) {

    $s = [];
    foreach ($k as $i => $v) {
        $key = strlen($v) - 1;

        if ($i == 0) {
            $s[$i] = $v[$key];
        } elseif ($i == $key) {
            $s[$i] = $v[0];
        } else {
            $s[$i] = $v[0];
            if ($v[0] == $v[$key]) {
                $s[$i] = $v[$key];
            }
        }
    }

    if (count(array_unique($s)) == 1) {
        echo "Ordering is possible.\n";
    } else {
        echo "The door cannot be opened.\n";
    }
}


