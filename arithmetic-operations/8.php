<?php
/*
1 Сотрудник получает зарплату (отработанные часы) × (базовая оплата)
  (hours worked) × (base pay) за каждый час до 40 часов.
2 За каждый час свыше 40 они получают сверхурочную работу = (
  базовая оплата) × 1,5.  overtime = (base pay) × 1.5.
3 Базовая заработная плата не должна быть меньше минимальной заработной платы
  (8 долларов в час). Если это так, распечатайте ошибку.
4 Если количество часов больше 60, выведите сообщение об ошибке.

Напишите метод, который принимает в качестве параметров базовую заработную
плату и отработанные часы и печатает общую оплату или ошибку.
Напишите основной метод, который вызывает этот метод для каждого из этих
сотрудников:
Employee 	Base Pay 	Hours Worked
Employee 1 	$7.50 	    35
Employee 2 	$8.20 	    47
Employee 3 	$10.00 	    73
*/
function createEmployee(string $name, float $basePay, int $hoursWorked): stdClass
{
    $emp = new stdClass();
    $emp->Employee = $name;
    $emp->BasePay = $basePay;
    $emp->HoursWorked = $hoursWorked;
    return $emp;
}

$arr = [
    1 => createEmployee("Employee1", 7.50, 35),
    createEmployee("Employee2", 8.20, 47),
    createEmployee("Employee3", 10.00, 73)

];
//===
echo "Employee 	Base Pay    Hours Worked" . PHP_EOL;
echo "Employee 1 	$7.50 	    35" . PHP_EOL;
echo "Employee 2 	$8.20 	    47" . PHP_EOL;
echo "Employee 3 	$10.00 	    73" . PHP_EOL;
echo "==========================================" . PHP_EOL;
$i = readline("Enter a number [1 - 3]: ");
$totalPay = null;

function allPay($b, $h)
{
    $basePay = 8;
    $hoursWorked = 40;
//    $overtime = $basePay * 1.5;

    if ($h <= $hoursWorked) {
        if ($b < $basePay) {
            echo "The base pay must not be less than the minimum 8." . PHP_EOL;
            $totalPay = null;
        } else {
            $totalPay = $b * $h;
        }
    } elseif ($h > $hoursWorked && $h < 60) {
        $totalPay = ($b * $h) * 1.5;
    } elseif ($h > 60) {
        echo "Number of hours is greater than 60" . PHP_EOL;
        $totalPay = null;
    }

    echo $totalPay . PHP_EOL;
}

function main($arr, $i)
{
    $b = null;
    $h = null;
    if (isset($arr[$i])) {
        $b = $arr[$i]->BasePay;
        $h = $arr[$i]->HoursWorked;
    }
    allPay($b, $h);
}

main($arr, $i);
