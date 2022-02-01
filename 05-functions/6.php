<?php
$arr = [1, 2, 3, 4.5, 'one'];

function double($i)
{
    if (is_int($i)) {
        return $i*2;
    }
}

for ($i = 0; $i < count($arr); $i++)
{
    echo double($arr[$i]) . PHP_EOL;
}

