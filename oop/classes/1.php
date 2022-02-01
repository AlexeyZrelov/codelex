<?php

class Product
{
    private string $name;
    private float $startPrice;
    private int $amount;

    public function __construct(string $name, float $startPrice, float $amount)
    {
        $this->name = $name;
        $this->startPrice = $startPrice;
        $this->amount = $amount;
    }

    public function setStartPrice($arg): void
    {
        $this->startPrice = $arg;
    }

    public function getStartPrice(): float
    {
        return $this->startPrice;
    }

    public function setAmount($arg): void
    {
        $this->amount = $arg;
    }

    public function getAmount(): int
    {
        return $this->amount;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function printProduct(): void
    {
        echo "$this->name, $this->startPrice EUR, $this->amount units";
    }
}

class Main
{
    private array $store = [];

    public function addStore(Product $obj): void
    {
        $this->store[] = $obj;
    }

    public function getStore(): array
    {
        return $this->store;
    }
}

$prod1 = new Product('Logitech mouse', 70.00, 14);
$prod2 = new Product('iPhone 5s', 999.99, 3);
$prod3 = new Product('Epson EB-U05', 440.46, 1);

$main = new Main();
$main->addStore($prod1);
$main->addStore($prod2);
$main->addStore($prod3);

foreach ($main->getStore() as $i => $v) {
    echo "[$i] ";
    echo $v->printProduct() . PHP_EOL;
}

while (true) {
    echo "=================================================\n";
    $s = readline('select product[0-2], Exit[3]: ');
    echo "=================================================\n";

    switch ($s) {
        case 0:

            echo $main->getStore()[$s]->getName() . ", "
                . $main->getStore()[$s]->getStartPrice() . " EUR, "
                . $main->getStore()[$s]->getAmount() . " units" . PHP_EOL;
            echo "------------------------------------------\n";
            $p = readline('New price[00.00]: ');
            $a = readline('New amount[1-100]: ');
            echo "------------------------------------------\n";

            $main->getStore()[$s]->setStartPrice($p) . PHP_EOL;
            $main->getStore()[$s]->setAmount($a) . PHP_EOL;

            foreach ($main->getStore() as $i => $v) {
                echo "[$i] ";
                echo $v->printProduct() . PHP_EOL;
            }

            break;
        case 1:

            echo $main->getStore()[$s]->getName() . ", "
                . $main->getStore()[$s]->getStartPrice() . " EUR,"
                . $main->getStore()[$s]->getAmount() . " units" . PHP_EOL;
            echo "------------------------------------------\n";
            $p1 = readline('New price[00.00]: ');
            $a1 = readline('New amount[1-100]: ');
            echo "------------------------------------------\n";

            $main->getStore()[$s]->setStartPrice($p1) . PHP_EOL;
            $main->getStore()[$s]->setAmount($a1) . PHP_EOL;

            foreach ($main->getStore() as $i => $v) {
                echo "[$i] ";
                echo $v->printProduct() . PHP_EOL;
            }

            break;
        case 2:

            echo $main->getStore()[$s]->getName() . ", "
                . $main->getStore()[$s]->getStartPrice() . " EUR,  "
                . $main->getStore()[$s]->getAmount() . " units" . PHP_EOL;
            echo "------------------------------------------\n";
            $p2 = readline('New price[00.00]: ');
            $a2 = readline('New amount[1-100]: ');
            echo "------------------------------------------\n";

            $main->getStore()[$s]->setStartPrice($p2) . PHP_EOL;
            $main->getStore()[$s]->setAmount($a2) . PHP_EOL;

            foreach ($main->getStore() as $i => $v) {
                echo "[$i] ";
                echo $v->printProduct() . PHP_EOL;
            }

            break;
        case 3:
            exit;
    }

}
