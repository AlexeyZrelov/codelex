<?php

class Point
{
    private int $x;
    private int $y;

    public function __construct(int $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function setX(int $x): void
    {
        $this->x = $x;
    }

    public function getX(): int
    {
        return $this->x;
    }

    public function setY(int $y): void
    {
        $this->y = $y;
    }

    public function getY(): int
    {
        return $this->y;
    }

}

function swapPoints(Point $p1, Point$p2)
{
    $x = $p1->getX();
    $y = $p1->getY();

    $p1->setX($p2->getX());
    $p1->setY($p2->getY());

    $p2->setX($x);
    $p2->setY($y);
}

$p1 = new Point(5, 2);
$p2 = new Point(-3, 6);

swapPoints($p1, $p2);

echo "(" . $p1->getX() . ", " . $p1->getY() . ")" . PHP_EOL;
echo "(" . $p2->getX() . ", " . $p2->getY() . ")" . PHP_EOL;
