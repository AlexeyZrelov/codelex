<?php

namespace App;

class Person
{
    private string $name;
    private string $surname;
    private string $pKod;

    public function __construct(string $name, string $surname, string $pKod)
    {
        $this->name = $this->validatePerson($name);
        $this->surname = $this->validatePerson($surname);
        $this->pKod = $this->validatePerson($pKod);

    }

    private function validatePerson($arg): string
    {
        $value = trim($arg);
        $value = stripcslashes($arg);
        $value = strip_tags($arg);

        return $value;
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