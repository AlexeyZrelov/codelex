<?php

class Game
{
    private array $deck = [];
    private array $diller = [];
    private array $player = [];

    public function setDeck(): void
    {
        $this->deck = [
            '2♤' => 2,
            '3♧' => 3,
            '4♤' => 4,
            '5♡' => 5,
            '6♢' => 6,
            '7♧' => 7,
            '8♤' => 8,
            '9♡' => 9,
            '10♢' => 10,
            'J♧' => 10,
            'D♤' => 10,
            'K♡' => 10,
            'T♢' => 11
        ];
    }

    public function getDeck(): array
    {
        return $this->deck;
    }

    public function getCard(): array
    {
        $card = [];
        $key = array_rand($this->getDeck());
        $card[$key] = $this->getDeck()[$key];
        return $card;
    }

    public function setDiller(): void
    {
        $key = array_rand($this->getDeck(),2);
        for ($i = 0; $i < count($key); $i++) {
            $this->diller[$key[$i]] = $this->getDeck()[$key[$i]];
        }
    }

    public function getDiller(): array
    {
        return $this->diller;
    }

    public function clearDiller(): void
    {
        $this->diller = [];
    }

    public function addDiller(): void
    {
        $key = array_rand($this->getDeck());
        $this->diller[$key] = $this->getDeck()[$key];
    }

    public function setPlayer(): void
    {
        $key = array_rand($this->getDeck(),2);
        for ($i = 0; $i < count($key); $i++) {
            $this->player[$key[$i]] = $this->getDeck()[$key[$i]];
        }
    }

    public function getPlayer(): array
    {
        return $this->player;
    }

    public function clearPlayer(): void
    {
        $this->player = [];
    }

    public function addPlayer(): void
    {
        $key = array_rand($this->getDeck());
        $this->player[$key] = $this->getDeck()[$key];
    }

}

$a = new Game();
$a->setDeck();

while (true) {

    echo "\n==========================\n";
    $s = readline('New[enter], hold[h], pick card[p], exit[e]: ');

    switch ($s) {
        case '':

            $a->clearDiller();
            $a->clearPlayer();

            $a->setDiller();
            $a->setPlayer();

            break;
        case 'h':

            // Dealer
            $a->addDiller();

            break;
        case 'p':

            // Player
            $a->addPlayer();

            break;
        case 'e':
            exit();
    }

    echo "==========================\n";
    echo '      ♔♔♔ Start ♔♔♔' . PHP_EOL;

    // Dealer
    $sum = array_sum($a->getDiller());
    echo "Dealer: ";
    foreach ($a->getDiller() as $i => $v) {
        echo " [$i] ";
    }
    echo " [ ] Sum($sum)" . PHP_EOL;

    // Player
    $sumP = array_sum($a->getPlayer());
    echo "Player: ";
    foreach ($a->getPlayer() as $i => $v) {
        echo " [$i] ";
    }
    echo " [ ] Sum($sumP)" . PHP_EOL;

    // Check win
    if ($sum == $sumP) {
        echo "*** Push ! ***";
    } elseif ($sumP == 21 || $sum == 21) {
        echo "   *** Black jack !!! ***\n";
        exit;
    } elseif ($sumP > $sum && $sumP <= 21) {
        echo "   *** Player win ! ***";
    } elseif ($sum > $sumP  && $sum <= 21) {
        echo "   *** Dealer win ! ***";
    } elseif ($sumP > 21) {
        echo "   *** Dealer win ! ***\n";
        exit;
    } elseif ($sum > 21) {
        echo "   *** Player win ! ***\n";
        exit;
    }

}