<?php

class Light
{
    private int $dipped;
    private int $high;
    const LIGHT_CONDITION = 100;

    public function __construct(int $dipped = 100, int $high = 100)
    {
        $this->dipped = $dipped;
        $this->high = $high;
    }

    public function getDipped(): int
    {
        return $this->dipped;
    }

    public function getHigh(): int
    {
        return $this->high;
    }

    public function deccreaseDip(): void
    {
        $this->dipped -= rand(1,2);
    }

    public function decreaseHigh(): void
    {
        $this->high -= rand(1, 3);
    }

}
