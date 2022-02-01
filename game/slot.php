<?php

$x = 3;
$y = 3;

//$chars = ['A', 'B', 'C', 'D', 'E', 'F'];
$chars = range('A', 'F');
$items = [];

for ($i = 0; $i < $y; $i++) {
    $items[] = $chars[$i];
}

$cost = range(10, $y * 10, 10);

function costChar(array $arr, array $arr1): void
{
    $c = array_combine($arr, $arr1);

    foreach ($c as $i => $v) {
        echo " $i($v) ";
    }
}

$comb = [
    [
        [0, 0], [1, 1], [2, 2]
    ],
    [
        [2, 0], [1, 1], [0, 2]
    ]
];

function showBoard(array $board): void
{
    foreach ($board as $i) {
        foreach ($i as $j) {
            echo " $j ";
        }
        echo PHP_EOL;
    }
}

$count = 0;
$credit = 100;
$bet = 1;
$pay = 10;

while (true) {

    $board = [];

    for ($i = 0; $i < $x; $i++) {
        for ($j = 0; $j < $y; $j++) {
            $board[$i][] = $items[array_rand($items)];
        }
    }

    echo "\n=====================\n";
    echo " Pay($pay) " . costChar($items, $cost) . PHP_EOL;

    $betX = readline('Next [Enter], Bet x2 [2], Bet x3 [3] : ');

    switch ($betX) {
        case 2:
            $bet = 2;
            break;
        case 3:
            $bet = 3;
            break;
        default:
            $bet = 1;
    }

    $spin = readline('Spin [Enter], Exit [n] : ');

    echo "\n=Count==Credit===Bet=\n";
    echo "  [$count]   [$credit]   [$bet]  \n";

    if ($spin === '') {

        $credit -= ($pay * $bet);

        $count ++;

        showBoard($board);

        // Check line
        foreach ($board as $i) {

            if (count(array_unique($i)) === 1) {

                $key = array_keys($chars, $i[0]);

                $credit += ($cost[$key[0]] * $bet);

                echo "Win line ($i[0]) + ({$cost[$key[0]]})" . PHP_EOL;

            }

        }

        // Check diagonal
        foreach ($comb as $val) {

            $diagonal = [];
            foreach ($val as $item) {

                [$row, $column] = $item;
                $diagonal[] = $board[$row][$column];
            }

            if (count(array_unique($diagonal)) === 1) {

                $key = array_keys($chars, $diagonal[0]);

                $credit += ($cost[$key[0]] * $bet);

                echo "Win diagonal ($diagonal[0]) + ({$cost[$key[0]]})" . PHP_EOL;

            }
        }

    } else if ($spin === 'n') {
        exit;
    }

}
