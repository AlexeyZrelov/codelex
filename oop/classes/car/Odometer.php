<?php

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
