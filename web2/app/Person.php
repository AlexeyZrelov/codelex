<?php

namespace App;

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