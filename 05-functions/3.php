<?php
$men = [
    "name"    => "Alex",
    "surname" => "Ulf",
    "age"     => "50",
];

function calc($arr)
{
    return (int) $arr['age'] > 18 ? 'Yes' : 'No';
}

echo calc($men) . PHP_EOL;