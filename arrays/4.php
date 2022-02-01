<?php
/*
Then display the contents of both arrays.
To get the output to look like this, you'll need a several for loops.

    Create an array of ten integers
    Fill the array with ten random numbers (1-100)
    Copy the array into another array of the same capacity
    Change the last value in the first array to a -7
    Display the contents of both arrays

Array 1: 45 87 39 32 93 86 12 44 75 -7
Array 2: 45 87 39 32 93 86 12 44 75 50
 */

$arr1 = [];

for ($i = 0; $i < 10; $i++) {
    $arr1[$i] = rand(1, 100);
}

$arr2 = $arr1;
$arr1[count($arr1) - 1] = -7;

echo "Array 1: ";
for ($i = 0; $i < 10; $i++) {
    echo "$arr1[$i] ";
}
echo  PHP_EOL;

echo "Array 2: ";
for ($i = 0; $i < 10; $i++) {
    echo "$arr2[$i] ";
}
echo  PHP_EOL;
