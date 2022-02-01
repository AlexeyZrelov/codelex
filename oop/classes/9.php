<?php

class BankAccount
{
    private string $name;
    private float $balance;

    public function __construct(string $name, float $balance)
    {
        $this->name = $name;
        $this->balance = $balance;
    }

    public function showUserNameAndBalance(): string
    {
        $c = number_format($this->balance, 2);

        return $c = $this->balance < 0 ?
            str_replace('-', '-$', $c):
            $this->name . ', $' . $c;

    }

}

$n = readline('Enter Name: ');
$b = readline('Enter balance[00.00]: ');

$a = new BankAccount($n, $b);

echo "{$a->showUserNameAndBalance()}" . PHP_EOL;
