<?php

class Product
{
    public string $name;
    public float $cena;
    public float $amt;

    public function __construct(string $name, float $cena, float $amt)
    {
        $this->name = $name;
        $this->cena = $cena;
        $this->amt = $amt;
    }

}

class Shop
{
    public array $store;

    public function addProduct(Product $obj): void
    {
        $this->store[] = $obj;
    }

    public function getStore(): array
    {
        return $this->store;
    }
}

$x = new Product('Apple', 3.55, 11);
$x1 = new Product('Milk', 1.50, 15);
$x2 = new Product('Beer', 2.20, 21);
$x3 = new Product('Bread', 1.10, 34);

$y = new Shop();
$y->addProduct($x);
$y->addProduct($x1);
$y->addProduct($x2);
$y->addProduct($x3);

$total = [];

foreach ($y->getStore() as $i) {
    echo " $i->name price: " . round($i->cena, 2) . " amount: $i->amt summa = " . $i->cena * $i->amt . PHP_EOL;
    $total[] = $i->cena * $i->amt;
}
echo "===========================================\n";
echo " Total summa: ". array_sum($total) . PHP_EOL;