<?php

class Weapon
{
    public  string  $name;
    public  int $pow;

    public function __construct(string $name, int $pow)
    {
        $this->name = $name;
        $this->pow = $pow;
    }
}

class Inventory
{
    public array $bag;

    public function addWeapon(Weapon $obj): void
    {
        $this->bag[] = $obj;
    }

    public function getBag(): array
    {
        return $this->bag;
    }
}

$x = new Weapon('Glock', 100);
$x1 = new Weapon('TT', 70);
$x2 = new Weapon('Colt', 95);

$y = new Inventory();
$y->addWeapon($x);
$y->addWeapon($x1);
$y->addWeapon($x2);

foreach ($y->getBag() as $i) {
    echo " $i->name = $i->pow " . PHP_EOL;
}
