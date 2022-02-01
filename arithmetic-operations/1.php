<?php
$intX = 30;
$intY = 15;
if (($intX == 15 || $intY == 15) || (($intX + $intY) == 15) || ($intX - $intY) == 15)
{
    echo 'true' . PHP_EOL;
} else {
    echo 'false' . PHP_EOL;
}