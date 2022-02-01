<?php

class FuelGauge
{
    const MAX_AMOUNT = 70.00;
    private float $amountFuel;

    public function __construct(float $amountFuel = 0)
    {
        $this->amountFuel = $amountFuel;
    }

    public function addFuel($arg): void
    {
        $this->amountFuel += $arg;
    }

    public function setAmountFuel(float $amountFuel): void
    {
        $this->amountFuel = $amountFuel;
    }

    public function currentAmount(): float
    {
        return $this->amountFuel;
    }

    public function reportAmount()
    {

    }
}

class Odometer
{
    const MAX_MIL = 999.999;
    private float $mileage;

    public function __construct(float $mileage = 0)
    {
        $this->mileage = $mileage;
    }

    public function addMileage()
    {
        $this->mileage += 1;
    }

    public function setMileage(float $mileage): void
    {
        $this->mileage = $mileage;
    }

    public function currentMileage(): float
    {
        return $this->mileage;
    }

    public function decreaseFuel(FuelGauge $obj): float
    {
        return $obj->currentAmount() - 1;
    }

}

$fuel = new FuelGauge(0);
$odom = new Odometer(3);
//$odom = new Odometer(990.00);

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

                    $odom->addMileage();

                    if ($i % 10 === 0) {
                        $fuel->setAmountFuel($odom->decreaseFuel($fuel));
                    }

                    if ($odom->currentMileage() == (int) round($odom::MAX_MIL)) {
                        $odom->setMileage(0);
                    }

                    echo "Mileage[ {$odom->currentMileage()} ] Fuel[ {$fuel->currentAmount()} ] \n";

                }

                break;
            case 'e':
                exit;
        }


    }

}