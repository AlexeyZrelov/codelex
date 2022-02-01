<?php

$selection = ['rock', 'paper', 'scissors', 'lizard', 'spock'];

$player = 'rock'; // readline
//$player = 'paper'; // readline
//$player = 'scissors'; // readline

$pc = $selection[array_rand($selection)];

echo "$player VS $pc";
echo PHP_EOL;

$combinations = [
    'rock' => ['scissors', 'lizard'],
    'scissors' => ['paper', 'lizard'],
    'paper' => ['rock','spock'],
    'lizard' => ['spock', 'paper'],
    'spock' => ['scissors', 'rock']
];

if ($player === $pc) {
    echo 'TIE!!!';
    exit;
}

echo in_array($pc, $combinations[$player]) ? 'I WON!!!': 'I LOST!!!';
echo PHP_EOL;

//if (in_array($pc, $combinations[$player])) {
//    echo "I WON!!!" . PHP_EOL;
//} else {
//    echo "I LOST!!!" . PHP_EOL;
//}