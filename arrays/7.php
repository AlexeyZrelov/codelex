<?php

$gameFile = explode("\n", file_get_contents('game.txt'));

$tmpBoard = explode(':', $gameFile[0]);
[$boardX, $boardY] = explode('x', $tmpBoard[1]);

$tmpComb = explode(':', $gameFile[1]);
$tmpC = explode('|', $tmpComb[1]);
$tmpC0 = explode(';', $tmpC[0]);
$tmpC1 = explode(';', $tmpC[1]);
$tmpC2 = explode(';', $tmpC[2]);
$tmpC3 = explode(';', $tmpC[3]);

$comb00 = explode(',', $tmpC0[0]);
$comb01 = explode(',', $tmpC0[1]);
$comb02 = explode(',', $tmpC0[2]);

$comb10 = explode(',', $tmpC1[0]);
$comb11 = explode(',', $tmpC1[1]);
$comb12 = explode(',', $tmpC1[2]);

$comb20 = explode(',', $tmpC2[0]);
$comb21 = explode(',', $tmpC2[1]);
$comb22 = explode(',', $tmpC2[2]);

$comb30 = explode(',', $tmpC3[0]);
$comb31 = explode(',', $tmpC3[1]);
$comb32 = explode(',', $tmpC3[2]);

$combinations = [
  [$comb00, $comb01, $comb02],
  [$comb10, $comb11, $comb12],
  [$comb20, $comb21, $comb22],
  [$comb30, $comb31, $comb22]
];

$board = [];

for ($i = 0; $i < $boardX; $i++) {
    $board[$i] = str_split(str_repeat('-', $boardY));
}

//$board = [
//    ['-', '-', '-'],
//    ['-', '-', '-'],
//    ['-', '-', '-'],
//];

$player1 = readline('Change char X : ') ?? 'X';
$player2 = readline('Change char O : ') ?? 'O';

//$player1 = 'X';
//$player2 = 'O';

$activePlayer = $player1;

//$combinations = [
//    [
//        [0, 0], [0, 1], [0, 2]
//    ],
//    [
//        [1, 0], [1, 1], [1, 2]
//    ],
//    [
//        [2, 0], [2, 1], [2, 2]
//    ],
//    [
//        [0, 0], [1, 1], [2, 2]
//    ]
//];

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

while (!isBoardFull($board) && !winner($combinations, $board, $activePlayer)) {

//    echo "Player $activePlayer" . PHP_EOL;
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

echo 'The game was tied.';
echo PHP_EOL;