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
    public array $rand = [];

    public function __construct(array $cards = [])
    {
        $this->cards = $cards;
        if (empty($this->cards)) $this->setDeck();

        $this->splitDeck();
    }

    public function setRand(int $toggle): void
    {
        if ($toggle == 0) {
            $key = array_rand($this->play1, 1);
            $this->rand = $this->play1[$key];
        }
        if ($toggle == 1) {
            $key = array_rand($this->play2, 1);
            $this->rand = $this->play2[$key];
        }
    }

    public function clearRand(): void
    {
        $this->rand = [];
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
            if (($i == $this->rand['value'] && $v == 2) || ($i == $this->rand['value'] && $v == 4)) {
                foreach ($this->play1 as $ind => $val) {
                    if ($val['value'] == $i) {
                        unset($this->play1[$ind]);
                    }
                }
            }
            if ($i == $this->rand['value'] && $v == 3) {
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
            if (($v == 2 && $i == $this->rand['value']) || ($v == 4 && $i == $this->rand['value'])) {
                foreach ($this->play2 as $ind => $val) {
                    if ($val['value'] == $i) {
                        unset($this->play2[$ind]);
                    }
                }
            }
            if ($i == $this->rand['value'] && $v == 3) {
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

}

$a = new Deck();

$toggle = null;

echo "\n================================\n";
$s = readline('Start[enter], exit[e]: ');

while (true) {

    echo "\n================================";

    sleep(1);

    switch ($s) {
        case '':

            $a->clearRand();

            $toggle = ($toggle == 0) ? 1 : 0;
            $a->setRand($toggle);

            $a->deleteDoublePlayer1();
            $a->deleteDoublePlayer2();

            break;
        case 0:
            exit();
    }

    echo "================================\n";
    echo '   ♔♔♔ Start [' . $a->rand['value'].$a->rand['symbol'] . '] ♔♔♔' . PHP_EOL;
    echo "================================\n";

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

    // Check
    if (count(array_column($a->getPlay1(), 'value')) == count(array_unique(array_column($a->getPlay1(), 'value')))) {
        echo PHP_EOL;
        exit;

    }

    if (count(array_column($a->getPlay2(), 'value')) == count(array_unique(array_column($a->getPlay2(), 'value')))) {
        echo PHP_EOL;
        exit;

    }

}