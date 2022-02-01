<?php

require_once 'FuelGauge.php';
require_once 'Odometer.php';
require_once 'Tires.php';
require_once 'Light.php';
require_once 'Accumulator.php';

$fuel = new FuelGauge(1);
$odom = new Odometer(0);

$tireA = new Tires();
$tireB = new Tires();
$tireC = new Tires();
$tireD = new Tires();

$light = new Light();

$accumulator = new Accumulator();

$s = readline('Start[enter]: ');

while (true) {

    echo "Current amount of fuel: {$fuel->currentAmount()}" . PHP_EOL;
    echo "Current mileage: {$odom->currentMileage()}" . PHP_EOL;

    if ($s == "") {
        $f = trim(readline("Increase the amount of fuel by 10 liters[y/n], Exit[e]: "));

        switch ($f) {
            case 'y':

                if ($fuel->currentAmount() == $fuel::MAX_AMOUNT) {
                    echo "Full tank\n";
                } else {
                    $fuel->addFuel(10);
                }

                break;
            case 'n':

                echo "Current mileage: {$odom->currentMileage()}\n";

                for ($i = 0; 0 < $fuel->currentAmount(); $i++) {

                    sleep(1);

                    $tireA->setWear($tireA->decreaseWear());
                    $tireB->setWear($tireB->decreaseWear());
                    $tireC->setWear($tireB->decreaseWear());
                    $tireD->setWear($tireB->decreaseWear());

                    $light->deccreaseDip();
                    $light->decreaseHigh();

                    $accumulator->addCharge();
                    $accumulator->decreaseEnerge();

                    $odom->addMileage();

                    if ($i % 10 === 0) {
                        $fuel->setAmountFuel($odom->decreaseFuel($fuel));
                    }

                    if ($odom->currentMileage() == (int) round($odom::MAX_MIL)) {
                        $odom->setMileage(0);
                    }

                    echo "Mileage[ {$odom->currentMileage()} ] Fuel[ {$fuel->currentAmount()} ] ";
                    echo "Wear tireA[{$tireA->getWear()}], tireB[{$tireB->getWear()}], tireC[{$tireC->getWear()}], tireD[{$tireD->getWear()}] ";
                    echo "Driving beam {$light->getHigh()}% , Dipped beam {$light->getDipped()}% \n";
                    echo "Charge + {$accumulator->getCharge()}, Energy - {$accumulator->getEnergy()}\n";

                    if ($tireA->getWear() == 0 ||
                        $tireB->getWear() == 0 ||
                        $tireC->getWear() == 0 ||
                        $tireD->getWear() == 0) {

                        echo "Wear is 0 !\n";
                        exit;
                    }

                    if ($light->getHigh() < 50 || $light->getDipped() < 50) {
                        echo "Light less than 50% !\n";
                        exit;
                    }

                    if ($accumulator->getEnergy() < 50) {
                        echo "Energy less than 50% !\n";
                        exit;
                    }

                }

                break;
            case 'e':
                exit;
        }


    }

}