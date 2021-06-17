<?php

namespace Collections;

use Models\Animal;

class Barn
{
    private array $animals = [];

    public function getAnimals(): array
    {
        return $this->animals;
    }

    public function addAnimal(Animal $animal)
    {
        $this->animals[] = $animal;
    }

    public function addAnimals(array $animals)
    {
        $this->animals = \array_merge($this->animals, $animals);
    }
}