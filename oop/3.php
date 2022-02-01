<?php

class Car
{
    public string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }
}

class Store
{
    public array $list;
    public array $reserved;

    public function addCar(Car $obj): void
    {
        $this->list[] = $obj;
    }

    public function getList(): array
    {
        return $this->list;
    }

    public function addReserved(string $str): void
    {
        $this->reserved[] = $str;
    }

    public function showCars(array $arr): void
    {
        $i = 0;
        foreach ($arr as $v) {
            $i ++;
            echo "$v->name[$i] ";
        }
        echo PHP_EOL;
    }

    public function showReserved(array $arr): void
    {
        $i = 0;
        foreach ($arr as $v) {
            $i ++;
            echo "$i: $v " .PHP_EOL;
        }
    }

}

$car = new Car('Audi A6');
$car1 = new Car('BMW X7');
$car2 = new Car('VAZ 2101');
$car3 = new Car('NIVA 2210');

$store = new Store();
$store->addCar($car);
$store->addCar($car1);
$store->addCar($car2);
$store->addCar($car3);

$j = 0;
foreach ($store->getList() as $i => $v) {
    $j ++;
    echo "$j: $v->name " . PHP_EOL;
    $store->addReserved($v->name);
}
echo "=================\n";

$tmp = [];

while (true) {

    $r = readline("Choose a car[1-4] Exit[n]: " . $store->showCars($store->getList()));
    $c = '';
    switch ($r) {
        case 1:
            $c = $store->getList()[0];
            break;
        case 2:
            $c = $store->getList()[1];
            break;
        case 3:
            $c = $store->getList()[2];
            break;
        case 4:
            $c = $store->getList()[3];
            break;
        case 'n':
            exit;
    }

    if (isset($c)) {

        foreach ($store->reserved as $i => $val) {

            if ($val == $c->name) {
                $tmp[] = $val;
            }

            $store->reserved[$i] = $val == $c->name ? "xxx Reserved" : $val;
        }

        $store->showReserved($store->reserved);

        echo "=================\n";

        foreach ($tmp as $val) {
            echo " $val " . PHP_EOL;
        }

    }

}
