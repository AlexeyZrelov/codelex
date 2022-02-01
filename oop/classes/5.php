<?php

class Date
{
    private int $month;
    private int $day;
    private int $year;

    public function __construct(int $month = 0, int $day = 0, int $year = 0)
    {
        $this->month = $month;
        $this->day = $day;
        $this->year = $year;
    }

    public function setMonth(int $month): void
    {
        $this->month = $month;
    }

    public function getMonth(): int
    {
        return $this->month;
    }

    public function setDay(int $day): void
    {
        $this->day = $day;
    }

    public function getDay(): int
    {
        return $this->day;
    }

    public function setYear(int $year): void
    {
        $this->year = $year;
    }

    public function getYear(): int
    {
        return $this->year;
    }

    public function displayDate(): string
    {
        return "{$this->getMonth()}/{$this->getDay()}/{$this->getYear()}";
    }

}
//  checkdate(int $month, int $day, int $year): bool
$a = new Date();

$m = readline('Enter month[1-12]; ');
$d = readline('Enter day[1-31]; ');
$y = readline('Enter year[1-32767]; ');

$a->setMonth($m);
$a->setDay($d);
$a->setYear($y);

if (checkdate($a->getMonth(), $a->getDay(), $a->getYear()) === false) {
    echo "The date is not correct " . PHP_EOL;
} else {
    echo $a->displayDate() . PHP_EOL;
}
