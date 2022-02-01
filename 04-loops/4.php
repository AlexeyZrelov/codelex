<?php
$numInt = range(1, 30);
foreach ($numInt as $num)
{
    if ($num % 3 == 0)
    {
        echo $num . ' ';
    }
}