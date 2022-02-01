<?php

$numbers = [
    1789, 2035, 1899, 1456, 2013,
    1458, 2458, 1254, 1472, 2365,
    1456, 2165, 1457, 2456
];

//todo
echo "Original numeric array: ";
foreach ($numbers as $i => $val) {
        echo "$val ";
}
echo PHP_EOL;

//todo
echo "Sorted numeric array: ";
sort($numbers);
foreach ($numbers as $i => $val) {
    echo "$val ";
}
echo PHP_EOL;

$words = [
    "Java",
    "Python",
    "PHP",
    "C#",
    "C Programming",
    "C++"
];

//todo
echo "Original string array: ";
foreach ($words as $i => $val) {
    echo "$val ";
}
echo PHP_EOL;

//todo
echo "Sorted string array: ";
sort($words, SORT_NATURAL);
foreach ($words as $i => $val) {
    echo "$val ";
}
echo PHP_EOL;