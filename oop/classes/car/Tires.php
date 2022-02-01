<?php

class Tires
{
    private int $wear;

    public function __construct()
    {
        $this->wear = rand(80, 100);
    }

    public function setWear(int $wear): void
    {
        $this->wear = $wear;
    }

    public function getWear(): int
    {
        return $this->wear;
    }

    public function decreaseWear(): int
    {
        return $this->getWear() - rand(1, 5);
    }

}
