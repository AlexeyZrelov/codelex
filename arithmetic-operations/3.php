<?php
$min = 1;
$max = 100;
$sum = 0;
for ($i = $min; $i <= $max; $i++)
{
    $sum += $i;
}
$average = $sum / $max;

echo "The sum of 1 to 100 is $sum" . PHP_EOL;
echo "The average is $average" . PHP_EOL;