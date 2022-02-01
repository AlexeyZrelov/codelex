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
