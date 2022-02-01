<?php

class Game
{
    private array $deck = [];
    private array $diller = [];
    private array $player = [];

    public function setDeck(): void
    {
        $this->deck = range(7, 11);
    }

    public function getDeck(): array
    {
        return $this->deck;
    }

    public function setDiller(): void
    {
        $key = array_rand($this->getDeck(),2);
        $this->diller[] = $this->getDeck()[$key[0]];
        $this->diller[] = $this->getDeck()[$key[1]];
    }

    public function getDiller(): array
    {
        return $this->diller;
    }

    public function clearDiller(): void
    {
        $this->diller = [];
    }

    public function setPlayer(): void
    {
        $key = array_rand($this->getDeck(),2);
        $this->player[] = $this->getDeck()[$key[0]];
        $this->player[] = $this->getDeck()[$key[1]];
    }

    public function getPlayer(): array
    {
        return $this->player;
    }

    public function clearPlayer(): void
    {
        $this->player = [];
    }

}

$a = new Game();
$a->setDeck();

while (true) {

    $a->clearDiller();
    $a->clearPlayer();

    echo "\n=====================\n";
    $s = readline('Start game[enter], hold[h], pick card[p], exit[e]: ');

    switch ($s) {
        case '':
            echo "=====================\n";
            echo '♔♔♔ Start ♔♔♔' . PHP_EOL;
            // Diller
            $a->setDiller();
            $sum = array_sum($a->getDiller());
            echo "Diller: ";
            foreach ($a->getDiller() as $i => $v) {
                echo " $v ";
            }
            echo " Sum($sum)" . PHP_EOL;

            // Player
            $a->setPlayer();
            $sumP = array_sum($a->getPlayer());
            echo "Player: ";
            foreach ($a->getPlayer() as $i => $v) {
                echo " $v ";
            }
            echo " Sum($sumP)" . PHP_EOL;

            if ($sum == $sumP) {
                echo "*** Push ! ***";
            } elseif ($sumP == 21) {
                echo "*** Black jack !!! ***";
            } elseif ($sumP > $sum) {
                echo "*** Player win ! ***";
            } elseif ($sum > $sumP) {
                echo "*** Diller win ! ***";
            }

            break;
        case 'h':
            echo "=====================\n";
            echo '♚♚♚ Hold ♚♚♚' . PHP_EOL;

            echo "// TO DO !" . PHP_EOL;

            break;
        case 'p':
            echo "=====================\n";
            echo '❤❤❤ Pik ❤❤❤' . PHP_EOL;

            echo "// TO DO !" . PHP_EOL;

            break;
        case 'e':
            exit();
    }


}