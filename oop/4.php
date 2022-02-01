<?php

class Person
{
    private string $name;
    private string $surname;
    private string $pKod;

    public function __construct(string $name, string $surname, string $pKod)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->pKod = $pKod;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function getPKod(): string
    {
        return $this->pKod;
    }

}

class Register
{
    private array $reg = [];

    public function addReg(Person $obj): void
    {
        $this->reg[] = $obj;
    }

    public function getReg(): array
    {
        return $this->reg;
    }

    public function deleteElementOfRegister(int $index): void
    {
        unset($this->reg[$index]);
    }

    public function showRegister(): void
    {
        foreach ($this->getReg() as $i => $v) {
            echo $i . " ";
            echo $v->getName() . " ";
            echo $v->getSurname() . " ";
            echo $v->getPKod() . " ";
            echo PHP_EOL;
        }
    }
}

$person = new Person('Alex', 'Koh','123');
$person1 = new Person('Oliver', 'Ava','342');
$person2 = new Person('William', 'Bor','173');
$person3 = new Person('Sophia', 'Emm','973');

$reg = new Register();
$reg->addReg($person);
$reg->addReg($person1);
$reg->addReg($person2);
$reg->addReg($person3);

$reg->showRegister();

/*
foreach ($reg->getReg() as $i => $v) {
    echo $i . " ";
    echo $v->getName() . " ";
    echo $v->getSurname() . " ";
    echo $v->getPKod() . " ";
    echo PHP_EOL;
}
*/

while (true) {

    $add = readline('Add person[1], Delete[2], Exit[3]: ');

    switch ($add) {
        case 1:

            $n = trim(readline('Enter Name: '));
            $sn = trim(readline('Enter Surname: '));
            $pk = trim(readline('Enter person kod: '));

            $per = new Person($n, $sn, $pk);
            $reg->addReg($per);
            $reg->showRegister();

            break;
        case 2:

            $d = trim(readline('Enter number: '));
            $reg->deleteElementOfRegister($d);
            $reg->showRegister();

            break;
        case 3:
            exit;
    }

}