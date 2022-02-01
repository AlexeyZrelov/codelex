<?php

class Count
{
    private int $surveyed;
    private int $energy;
    private int $citrus;
    const PERCENT_ENERGY = 0.14;
    const PERCENT_CITRUS = 0.64;

    public function __construct($surveyed = 12467, $energy = 0, $citrus = 0)
    {
        $this->surveyed = $surveyed;
        $this->energy = $energy;
        $this->citrus = $citrus;
    }

    public function calculateEnergy(): int
    {
        return $this->energy = $this->surveyed * self::PERCENT_ENERGY;
    }

    public function calculateCitrus(): int
    {
        return $this->citrus = $this->energy * self::PERCENT_CITRUS;
    }

}

$count = new Count();

echo "The approximate number of customers who purchased one or more energy drinks per week: {$count->calculateEnergy()}\n";
echo "The approximate number of customers who prefer citrus flavored energy drinks: {$count->calculateCitrus()}\n";
