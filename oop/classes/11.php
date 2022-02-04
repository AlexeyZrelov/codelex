<?php

class Account
{
    private string $name;
    private float $balance;

    public function __construct(string $name, float $balance)
    {
        $this->name = $name;
        $this->balance = $balance;
    }

    public function __toString()
    {
        return $this->name . " " . $this->balance;
    }

    public function withdrawal(float $arg): float
    {
        return $this->balance -= $arg;
    }

    public function deposit(float $arg): float
    {
        return $this->balance += $arg;
    }

    public function balance(): float
    {
        return $this->balance;
    }

    public function getName(): string
    {
        return $this->name;
    }

}

class Lists
{
    private array $list = [];

    public function addToList(string $name, float $balance): void
    {
        $this->list[] = new Account($name, $balance);
    }

    public function getList(): array
    {
        return $this->list;
    }

    public function showList(): void
    {
        $n = 0;
        echo "\n===========================================\n";
        foreach ($this->getList() as $i => $v) {
            $n++;
//            echo "$n. '" . $v->getName() . " account' with the balance of " . $v->balance() . PHP_EOL;
            echo "$n. '" . $v->getName() . " account' with the balance of " .
                number_format($v->balance(), 1, '.', '') . PHP_EOL;
        }
        echo "===========================================\n";
    }
}

$bartos_account = new Account("Barto's account", 100.00);
$bartos_swiss_account = new Account("Barto's account in Switzerland", 1000000.00);

echo "Initial state\n";
echo $bartos_account . PHP_EOL;
echo $bartos_swiss_account . PHP_EOL;

$bartos_account->withdrawal(20);
echo "Barto's account balance is now: " . $bartos_account->balance() . PHP_EOL;
$bartos_swiss_account->deposit(200);
echo "Barto's Swiss account balance is now: ".$bartos_swiss_account->balance() . PHP_EOL;

echo "Final state\n";
echo $bartos_account . PHP_EOL;
echo $bartos_swiss_account . PHP_EOL;

echo "===========================================\n";

$list = new Lists();

while (true) {

    echo "Choose the operation you want to perform \n";
    echo "Choose 0 for EXIT\n";
    echo "Choose 1 Creates an account\n";
    echo "Choose 2 Withdraws\n";
    echo "Choose 3 Deposits\n";
    echo "Choose 4 Prints accounts\n";

    $command = (int)readline();

    switch ($command) {
        case 0:
            echo "Bye!";
            die;
        case 1:

            $name = readline('Enter your name: ');
            $balance = readline('Enter your balane: ');

            $list->addToList($name, $balance);

            break;
        case 2:

            $list->showList();

            $w = readline("Choose account: ");
            $arg = readline('Enter sum: ');
            $i = $w - 1;
            $list->getList()[$i]->withdrawal($arg);

            break;
        case 3:

            $list->showList();

            $w = readline("Choose account: ");
            $arg = readline('Enter sum: ');
            $i = $w - 1;
            $list->getList()[$i]->deposit($arg);

            break;
        case 4:

            $list->showList();

            break;
        default:
            echo "Sorry, I don't understand you..";
    }

}



