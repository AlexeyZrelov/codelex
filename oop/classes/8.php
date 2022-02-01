<?php

class SavingsAccount
{
    private float $balance;
    private float $annualInterestRate;
    private float $lastAmountOfInterestEarned;

    public function __construct(float $balance = 0, float $annualInterestRate = 0)
    {
        $this->balance = $balance;
        $this->annualInterestRate = $annualInterestRate;
        $this->lastAmountOfInterestEarned = 0.0;
    }

    public function Withdraw(float $amount): void
    {
        $this->balance -= $amount;
    }

    public function Deposit(float $amount): void
    {
        $this->balance += $amount;
    }

    public function addInterest(): void
    {
        // Get the monthly interest rate.
        $monthlyInterestRate = $this->annualInterestRate / 12;

        // Calculate the last amount of interest earned.
        $this->lastAmountOfInterestEarned = $monthlyInterestRate * $this->balance;

        // Add the interest to the balance.
        $this->balance += $this->lastAmountOfInterestEarned;

    }

    public function getBalance(): float
    {
        return $this->balance;
    }

    public function getAnnualInterestRate(): float
    {
        return $this->annualInterestRate;
    }

    public function getLastAmountOfInterestEarned(): float
    {
        return $this->lastAmountOfInterestEarned;
    }

}

$startBalane = readline("How much money is in the account?: ");
$annualInterestRate = readline('Enter the annual interest rate: ');

$a = new SavingsAccount($startBalane, $annualInterestRate);

$months = readline('How long has the account been opened? ');

$montlyDeposit = 0;
$monthlyWithdrawl = 0;
$interestEarned = 0.0;
$totalDeposits = 0;
$totalWithdrawn = 0;

// For each month as user to enter information
for ($i = 1; $i <= $months; $i++) {

    // Get deposits for month
    echo " $i ";
    $montlyDeposit = readline('Enter amount deposited for month: ');
    $totalDeposits += $montlyDeposit;

    // Add deposits savings account
    $a->Deposit($montlyDeposit);

    // Get withdrawals for month
    $monthlyWithdrawl = readline('Enter amount withdrawn for: ');
    $totalWithdrawn += $monthlyWithdrawl;

    // Subtract the withdrawals
    $a->Withdraw($monthlyWithdrawl);

    // Add the monthly interest
    $a->addInterest();

    // Accumulate the amount of interest earned.
    $interestEarned += $a->getLastAmountOfInterestEarned();
}

$totalDeposits = number_format($totalDeposits, 2);
$totalWithdrawn = number_format($totalWithdrawn, 2);
$interestEarned = number_format($interestEarned, 2);
$bal = number_format($a->getBalance(), 2);

echo "Total deposited: $$totalDeposits " . PHP_EOL;
echo "Total withdrawn: $$totalWithdrawn " . PHP_EOL;
echo "Interest earned: $$interestEarned " . PHP_EOL;
echo "Ending balance: $$bal " . PHP_EOL;


/*
 How much money is in the account?: 10000
Enter the annual interest rate:5
How long has the account been opened? 4
Enter amount deposited for month: 1: 100
Enter amount withdrawn for 1: 1000
Enter amount deposited for month: 2: 230
Enter amount withdrawn for 2: 103
Enter amount deposited for month: 3: 4050
Enter amount withdrawn for 3: 2334
Enter amount deposited for month: 4: 3450
Enter amount withdrawn for 4: 2340
Total deposited: $7,830.00
Total withdrawn: $5,777.00
Interest earned: $29,977.72
Ending balance: $42,030.72
 */
