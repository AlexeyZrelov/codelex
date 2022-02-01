<?php
$int = 10;
$str = "10";

if ($int == $str)
{
    echo 'Correct' . PHP_EOL;
} else {
    echo 'Wrong' . PHP_EOL;
}

//Operands have incompatible types
if ($int === $str)
{
    echo 'Correct' . PHP_EOL;
} else {
    echo 'Wrong' . PHP_EOL;
}