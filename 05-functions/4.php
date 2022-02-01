<?php
$men1 = new stdClass();
$men1->name = "Alex";
$men1->surname = "Ulf";
$men1->age = 50;

$men2 = new stdClass();
$men2->name = "Oleg";
$men2->surname = "Golf";
$men2->age = 40;

$men3 = new stdClass();
$men3->name = "Gudr";
$men3->surname = "Gor";
$men3->age = 15;

$mens = array($men1, $men2, $men3);
$i = 2;

function calc($arr): bool
{
//    return ((int) $arr->age >= 18) ? 'Yes' : 'No';
    return $arr->age >= 18;
}

if (calc($mens[$i]) == true)
{
    foreach ($mens as $v)
    {
        echo $v->name . ' ' . $v->surname . ' ' . $v->age . PHP_EOL;
    }
} else {
    echo 'Ups-s-s-s!' . PHP_EOL;
}

//var_dump(calc($mens[2]));
//echo calc($mens[2]) . PHP_EOL;