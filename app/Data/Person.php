<?php

namespace App\Data;

class Person
{
    function __construct(public string $name, public int $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAge(): int
    {
        return $this->age;
    }
}