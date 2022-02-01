<?php

class Board
{
    private int $x;
    private int $y;
    private array $board = [];
    private array $items = [];
    private array $chars = [];
    private array $cost = [];

    public function __construct(int $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function setChars(): void
    {
        $this->chars = range('A', 'F');
    }

    public function getChars(): array
    {
        return $this->chars;
    }

    public function setItems(): void
    {
        for ($i = 0; $i < $this->y; $i++) {
            $this->items[] = $this->chars[$i];
        }
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function setBoard(): void
    {
        for ($i = 0; $i < $this->x; $i++) {
            for ($j = 0; $j < $this->y; $j++) {
                $this->board[$i][] = $this->items[array_rand($this->items)];
            }
        }
    }

    public function getBoard(): array
    {
        return $this->board;
    }

    public function setCost(): void
    {
        $this->cost = range(10, $this->y * 10, 10);
    }

    public function getCost(): array
    {
        return $this->cost;
    }

    public function costChar(): void
    {
        $c = array_combine($this->items, $this->cost);

        foreach ($c as $i => $v) {
            echo " $i($v) ";
        }
    }

    public function showBoar(array $board): void
    {
        foreach ($board as $i) {
            foreach ($i as $j) {
                echo " $j ";
            }
            echo PHP_EOL;
        }
    }

    public function showBoard(): void
    {
        foreach ($this->board as $i) {
            foreach ($i as $j) {
                echo " $j ";
            }
            echo PHP_EOL;
        }
    }

    public function getX(): int
    {
        return $this->x;
    }

    public function getY(): int
    {
        return $this->y;
    }

}

$a = new Board(3, 3);
$a->setChars();
$a->setItems();
$a->setCost();

$comb = [
    [
        [0, 0], [1, 1], [2, 2]
    ],
    [
        [2, 0], [1, 1], [0, 2]
    ]
];
$count = 0;
$credit = 100;
$bet = 1;
$pay = 10;

while (true) {

    $board = [];

    for ($i = 0; $i < $a->getX(); $i++) {
        for ($j = 0; $j < $a->getY(); $j++) {
            $board[$i][] = $a->getItems()[array_rand($a->getItems())];
        }
    }

    echo "\n=====================\n";
    echo " Pay($pay) " . $a->costChar() . PHP_EOL;

    $betX1 = readline(' Next [Enter], Bet x2 [2], Bet x3 [3] : ');

    switch ($betX1) {
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

        $a->showBoar($board);

        // Check line
        foreach ($board as $i) {

            if (count(array_unique($i)) === 1) {

                $key = array_keys($a->getChars(), $i[0]);

                $credit += ($a->getCost()[$key[0]] * $bet);

                echo "Win line ($i[0]) + ({$a->getCost()[$key[0]]})" . PHP_EOL;

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

                $key = array_keys($a->getChars(), $diagonal[0]);

                $credit += ($a->getCost()[$key[0]] * $bet);

                echo "Win diagonal ($diagonal[0]) + ({$a->getCost()[$key[0]]})" . PHP_EOL;

            }
        }

    } else if ($spin === 'n') {
        exit;
    }

}