<?php

$person = new stdClass();
$person->name = 'Ivars';
$person->cash = 2050;
$person->licenses = ['A', 'C'];

function createWeapon(string $name, int $price, string $license = null): stdClass
{
    $weapon = new stdClass();
    $weapon->name = $name;
    $weapon->license = $license;
    $weapon->price = $price;
    return $weapon;
}

$weapons = [
    createWeapon('Ak47', 1000, 'C'),
    createWeapon('Deagle', 500, 'A'),
    createWeapon('Knife', 100),
    createWeapon('Glock', 250, 'A'),
    createWeapon('M4A1', 250, 'C'),
];

echo "{$person->name} has {$person->cash}$" . PHP_EOL . PHP_EOL;

$basket = [];

while (true) {
    echo '[1] Purchase' . PHP_EOL;
    echo '[2] Checkout' . PHP_EOL;
    echo '[Any] Exit' . PHP_EOL;

    $option = (int) readline("Select an option: ");

    switch ($option) {
        case 1:
            foreach ($weapons as $index => $weapon) {
                echo "[{$index}] {$weapon->name} ({$weapon->license}) {$weapon->price}$" . PHP_EOL;
            }

            $selecteWeaponIndex = (int) readline('Select weapon: ');

            $weapon = $weapons[$selecteWeaponIndex] ?? null;

            if ($weapon === null) {
                echo "Weapon not found." . PHP_EOL;
                exit;
            }

            if ($weapon->license !== null && !in_array($weapon->license, $person->licenses)) {
                echo "Invalid license." . PHP_EOL;
                exit;
            }

            $basket[] = $weapon;

            echo "Added {$weapon->name} to basket." . PHP_EOL;
            break;
        case 2: // Checkout
            $totalSum = 0;
            foreach ($basket as $weapon) {
                $totalSum += $weapon->price;
                echo "{$weapon->name}" . PHP_EOL;
            }
            echo "===============================" . PHP_EOL;
            echo "Total: $totalSum";
            echo PHP_EOL;

            echo $person->cash >= $totalSum ? "Successful payment." : "Payment failed. Not enough cash.";

//            if ($person->cash >= $totalSum) {
//                $person->cash -= $totalSum;
//                echo "Successful payment.";
//            } else {
//                echo "Payment failed. Not enough cash.";
//            }

            echo PHP_EOL;

            exit;
        default:
            exit;
    }
}


//======
$person->cash -= $weapon->price;

echo "{$person->name} has left with {$person->cash}$" . PHP_EOL;