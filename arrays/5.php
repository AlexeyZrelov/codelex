<?php

$board = [
    ['X', ' ', 'O'],
    ['O', 'X', 'X'],
    [' ', 'X', 'O'],
];

function display_board(array $arr)
{
    echo " {$arr[0][0]} | {$arr[0][1]} | {$arr[0][2]}  \n";
    echo "---+---+---\n";
    echo " {$arr[1][0]} | {$arr[1][1]} | {$arr[1][2]}  \n";
    echo "---+---+---\n";
    echo " {$arr[2][0]} | {$arr[2][1]} | {$arr[2][2]}  \n";
}

echo "(...a game already in progress)" . PHP_EOL;

display_board($board);

while (true) {

    $inputO = readline("'O', choose your location (row, column): ");
    $inputO = $inputO ?? null;
    $locO = explode(' ', $inputO);
    $rowO = $locO[0];
    $columnO = $locO[1];
    if ($inputO) {
        $board[$rowO][$columnO] = 'O';
    }

    display_board($board);

    $inputX = readline("'X', choose your location (row, column): ");
    $inputX = $inputX ?? null;
    $locX = explode(' ', $inputX);
    $rowX = $locX[0];
    $columnX = $locX[1];
    if ($inputX) {
        $board[$rowX][$columnX] = 'X';
    }

    display_board($board);
    // Flatten
    if (!in_array(' ', array_merge(...$board))) {
        echo "The game is a tie." . PHP_EOL;
        exit;
    }

}
