<?php

class Dog
{
    private string $name;
    private string $sex;
    private string $mother;
    private string $father;

    public function __construct($name = 0, $sex = 0, $mother = 0, $father = 0)
    {
        $this->name = $name;
        $this->sex = $sex;
        $this->mother = $mother;
        $this->father = $father;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSex(): string
    {
        return $this->sex;
    }

    public function getMother(): string
    {
        return $this->mother;
    }

    public function getFather(): string
    {
        return $this->father;
    }

    public function fathersName(array $arr, string $name): string
    {
        $str = '';
        foreach ($arr as $v) {
            if ($v->getName() == $name) {
                $str = $v->getFather();
            }
        }
        return $str = $str ?: "Unknown";
    }

    public function mothersName(array $arr, string $name): string
    {
        $str = '';
        foreach ($arr as $v) {
            if ($v->getName() == $name) {
                $str = $v->getMother();
            }
        }
        return $str = $str ?: "Unknown";
    }

    public function hasSameMotherAs(array $arr, string $name): string
    {
        $str = '';
        foreach ($arr as $v) {
            if ($v->getName() == $name) {
                $str = $v->getMother();
            }
        }

        $str1 = '';
        foreach ($arr as $i) {
            if ($i->getMother() == $str) {
                $str1 .= $i->getName() . " ";
            }
        }
        return $str1;
    }

}

class DogTest
{
    private Dog $obj;
    private array $dogs = [];

    public function __construct()
    {
        $this->obj = new Dog();
    }

    public function main($name, $sex, $mother = 0, $father = 0): void
    {
        $this->dogs[] = new Dog($name, $sex, $mother, $father);
    }

    public function getDogs(): array
    {
        return $this->dogs;
    }

    public function getObj(): Dog
    {
        return $this->obj;
    }

    public function showDogs($arr, $name): string
    {
        return $this->obj->hasSameMotherAs($arr, $name);
    }

}

$dog = new Dog();
$test = new DogTest();

$test->main('Max', 'male', 'Lady', 'Rocky');
$test->main('Rocky', 'male', 'Molly', 'Sam');
$test->main('Sparky', 'male');
$test->main('Buster', 'male', 'Lady', 'Sparky');
$test->main('Sam', 'male');
$test->main('Lady', 'female');
$test->main('Molly', 'female');
$test->main('Coco', 'female', 'Molly', 'Buster');

foreach ($test->getDogs() as $v) {
    echo " {$v->getName()} {$v->getFather()} {$v->getMother()}" . PHP_EOL;
}

while (true) {

    echo "\n=========================\n";
    $ref = trim(readline('Exit[enter], Enter name of dog: '));
    echo "=========================\n";
    if ($ref == '') exit;
    if (!isset($ref)) return;

    echo "Name  : $ref \n";
    echo "Father: " . $dog->fathersName($test->getDogs(), $ref) . PHP_EOL;
//    echo "Mother: {$dog->mothersName($test->getDogs(), $ref)} ({$dog->hasSameMotherAs($test->getDogs(), $ref)}) " . PHP_EOL;
    echo "Mother: {$dog->mothersName($test->getDogs(), $ref)} " . PHP_EOL;

    echo "Has same mother as: ({$test->showDogs($test->getDogs(), $ref)})";
}
