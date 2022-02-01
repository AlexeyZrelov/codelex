<?php
$person = new stdClass();
$person->name = "John";
$person->surname = "Doe";
//Error
//$person->surname = 50;
$person->age = 50;
var_dump($person->name) . PHP_EOL;
var_dump($person->surname) . PHP_EOL;
var_dump($person->age) . PHP_EOL;