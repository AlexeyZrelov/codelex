<?php

class Accumulator
{
    private int $energy;
    private int $charge;

    public function __construct($energy = 100, $charge = 0)
    {
        $this->energy = $energy;
        $this->charge = $charge;
    }

    public function getEnergy(): int
    {
        return $this->energy;
    }

    public function getCharge(): int
    {
        return $this->charge;
    }

    public function decreaseEnerge(): void
    {
        $this->energy -= rand(1,5);
    }

    public  function addCharge(): void
    {
        $this->charge += 1;
    }
}
