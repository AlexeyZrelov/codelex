<?php
$x = 10;
$y = 30;
$z = 20;
if ($z > $x && $z < $y && (($y % 2) == 0))
{
    echo 'Correct Z' . PHP_EOL;
} else {
    echo 'Wrong Z' . PHP_EOL;
}
