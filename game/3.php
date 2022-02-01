<?php

//$x = 3;
//$y = 3;

$x = 4;
$y = 4;

$board = [];

for ($i = 0; $i < $x; $i++) {
    $board[$i] = str_split(str_repeat('-', $y));
}

//$combinations = [];
//
//foreach ($board as $x => $v) {
//    foreach ($v as $y => $i) {
//        $combinations[$x] = $i;
//    }
//}

//var_dump($combinations);die;
//print_r($combinations);die;


$combinations = [
    [
        [0, 0], [0, 1], [0, 2]
    ],
    [
        [1, 0], [1, 1], [1, 2]
    ],
    [
        [2, 0], [2, 1], [2, 2]
    ],
    [
        [2, 0], [1, 1], [0, 2]
    ],
    [
        [0, 0], [1, 1], [2, 2]
    ]
];

//var_dump($combinations);die;

$player = ['A', 'B', 'C', 'D'];

$player1 = readline('Change char A : ');
$player2 = readline('Change char B : ');
//$player3 = readline('Change char C : ');

$activePlayer = $player1;

function drawBoard($board): void
{
    foreach ($board as $item) {
        foreach ($item as $val) {
            echo " $val ";
        }
        echo PHP_EOL;
    }
}

function winner(array $combinations, array $board, string $activePlayer): bool
{
    foreach ($combinations as $combination) {
        foreach ($combination as $item)
        {
            [$row, $column] = $item;
            if ($board[$row][$column] !== $activePlayer) {
                break;
            }

            if (end($combination) === $item) {
                return true;
            }
        }
    }
    return false;
}

function isBoardFull(array $board): bool
{
    foreach ($board as $row) {
        if (in_array('-', $row)) return false;
    }
    return true;
}

//drawBoard($board);

while (!isBoardFull($board) && !winner($combinations, $board, $activePlayer)) {

    echo PHP_EOL;
    echo "===========" . PHP_EOL;
    drawBoard($board);
    echo PHP_EOL;

    $position = readline("Enter position ({$activePlayer}) : ");
    [$row, $column] = explode(',', $position);

    if ($board[$row][$column] !== '-') {
        echo 'Invalid position. its taken!' . PHP_EOL;
        continue;
    }

    $board[$row][$column] = $activePlayer;

    if (winner($combinations, $board, $activePlayer))
    {
        echo 'Winner is ' . $activePlayer;
        echo PHP_EOL;
        exit;
    }

    $activePlayer = $player1 === $activePlayer ? $player2 : $player1;
}
