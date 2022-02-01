<?php
abstract class Shape
{
    protected string $form;
    protected int $arg1;
    protected int $arg2;

    public function __construct(string $form, int $arg1, int $arg2)
    {
        $this->form = $form;
        $this->arg1 = $arg1;
        $this->arg2 = $arg2;
    }

}

class Triangle extends Shape
{
    public function __construct($form, $arg1, $arg2)
    {

        parent::__construct($form, $arg1, $arg2);
    }

    public function getS(): int
    {
        return ($this->arg1 * $this->arg2) / 2;
    }

    public function getForm(): string
    {
        return $this->form;
    }
}

class Square extends Shape
{
    public function __construct($form, $arg1, $arg2)
    {

        parent::__construct($form, $arg1, $arg2);
    }

    public function getS(): int
    {
        return $this->arg1 * $this->arg2;
    }

    public function getForm(): string
    {
        return $this->form;
    }
}

class Circle extends Shape
{
    public function __construct($form, $arg1, $arg2 = 0)
    {
        parent::__construct($form, $arg1, $arg2);
    }

    public function getS(): int
    {
        return pi() * ($this->arg1 ** 2);
    }

    public function getForm(): string
    {
        return $this->form;
    }
}

class Calculate
{
    public array $calc = [];

    public function addCalc($arg1, $arg2): void
    {
        $this->calc[$arg1] = $arg2;
    }

    public function getCalc(): array
    {
        return $this->calc;
    }
}

$calc = new Calculate();

while (true) {

    $add = trim(readline('Triangle[1], Square[2], Circle[3], Total S[4], Exit[5]: '));

    switch ($add) {
        case 1:

            $s = trim(readline('Enter Side(a) : '));
            $h = trim(readline('Enter Height(h): '));

            $tr = new Triangle('Triangle', $s, $h);

            $calc->addCalc($tr->getForm(), $tr->getS());

            echo "======================\n";
            echo "Form: " . $tr->getForm() . " S: " . $tr->getS() . PHP_EOL;
            echo "======================\n";

            break;
        case 2:

            $s = trim(readline('Enter Side(a): '));
            $h = trim(readline('Enter Side(b): '));

            $sq = new Square('Square', $s, $h);

//            $calc = new Calculate();
            $calc->addCalc($sq->getForm(), $sq->getS());

            echo "======================\n";
            echo "Form: " . $sq->getForm() . " S: " . $sq->getS() . PHP_EOL;
            echo "======================\n";

            break;
        case 3:

            $s = trim(readline('Enter Radius(r): '));

            $crc = new Circle('Circle', $s);

            $calc->addCalc($crc->getForm(), $crc->getS());

            echo "======================\n";
            echo "Form: " . $crc->getForm() . " S: " . $crc->getS() . PHP_EOL;
            echo "======================\n";

            break;
        case 4:

            $total = 0;
            foreach ($calc->getCalc() as $i => $v) {
                $total += $v;
                echo "Form: $i  S: $v" . PHP_EOL;
            }

            echo "====================\n";
            echo "Total: $total " . PHP_EOL;

            break;
        case 5:
            exit;
    }

}