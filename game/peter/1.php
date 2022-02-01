<?php

class Deck
{
    private array $cards = [];
    private array $symbols = [
        '♣', '♦', '♥', '♠'
    ];
    private array $value = [
        "2", "3", "4", "5", "6", "7", "8", "9", "10", "J", "Q", "K", "A"
    ];
    private array $color = ['red', 'black'];

    private array $play1 = [];
    private array $play2 = [];

    const COUNT = 10;

    public function __construct(array $cards = [])
    {
        $this->cards = $cards;
        if (empty($this->cards)) $this->setDeck();
    }

    private function setDeck(): void
    {
        foreach ($this->symbols as $i) {
            foreach ($this->value as $j) {

                $c = $i == '♦' || $i == '♥' ? $this->color[0]: $this->color[1];

                $this->cards[] = [
                    'value' => $j,
                    'symbol' => $i,
                    'color' => $c
                ];
            }
        }
    }

    public function splitDeck(): void
    {
        shuffle($this->cards);
        $size = ceil(count($this->cards) / 2);

        $this->play1 = array_slice($this->cards, 0, $size);
        $this->play2 = array_slice($this->cards, $size);
    }

    public function deleteDoublePlayer1(): void
    {
        $key = array_count_values(array_column($this->play1, 'value'));

        foreach ($key as $i => $v) {
            if ($v === 1) continue;
            if ($v === 2 || $v === 4) {
                foreach ($this->play1 as $ind => $val) {
                    if ($val['value'] == $i) {
                        unset($this->play1[$ind]);
                    }
                }
            }
            if ($v === 3) {
                $tmp = [];
                foreach ($this->play1 as $ind => $val) {
                    if ($val['value'] == $i) {
                        $tmp[] = $this->play1[$ind];
                        unset($this->play1[$ind]);
                    }
                }
                $this->play1[] = $tmp[0];
            }
        }
    }

    public function deleteDoublePlayer2(): void
    {
        $key = array_count_values(array_column($this->play2, 'value'));

        foreach ($key as $i => $v) {
            if ($v === 1) continue;
            if ($v === 2 || $v === 4) {
                foreach ($this->play2 as $ind => $val) {
                    if ($val['value'] == $i) {
                        unset($this->play2[$ind]);
                    }
                }
            }
            if ($v === 3) {
                $tmp = [];
                foreach ($this->play2 as $ind => $val) {
                    if ($val['value'] == $i) {
                        $tmp[] = $this->play2[$ind];
                        unset($this->play2[$ind]);
                    }
                }
                $this->play2[] = $tmp[0];
            }
        }
    }

    public function getPlay1(): array
    {
        return $this->play1;
    }

    public function getPlay2(): array
    {
        return $this->play2;
    }

    public function getCards(): array
    {
        return $this->cards;
    }

    public function clearPlayers(): void
    {
        $this->play1 = [];
        $this->play2 = [];
    }

}

$a = new Deck();


while (true) {

    echo "\n================================\n";
    $s = readline('Start[enter], exit[e]: ');

    switch ($s) {
        case '':

            $a->clearPlayers();

            $a->splitDeck();

            break;
        case 0:
            exit();
    }

    echo "================================\n";
    echo '     ♔♔♔ Start ♔♔♔' . PHP_EOL;
    echo "================================\n";

    echo "Player1: ";
    foreach ($a->getPlay1() as $v) {
        echo "[{$v['value']}{$v['symbol']}]";
    }
    echo PHP_EOL;

    $a->deleteDoublePlayer1();

    echo "Player1: ";
    foreach ($a->getPlay1() as $v) {
        echo "[{$v['value']}{$v['symbol']}]";
    }
    echo PHP_EOL;

    echo "--------------------------------\n";
    echo "Player2: ";
    foreach ($a->getPlay2() as $v) {
        echo "[{$v['value']}{$v['symbol']}]";
    }
    echo PHP_EOL;

    $a->deleteDoublePlayer2();

    echo "Player2: ";
    foreach ($a->getPlay2() as $v) {
        echo "[{$v['value']}{$v['symbol']}]";
    }
    // Check

}