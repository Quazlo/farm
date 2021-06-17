<?php

namespace Factory;

use Models\Animal;
use Models\Cow;
use Models\Hen;

class AnimalFactory
{
    const DEFAULT_COUNT_COWS = 10;
    const DEFAULT_COUNT_HENS = 20;

    public static function createAnimals(string $className, int $count): array
    {
        $animals = [];

        for ($i = 0; $i < $count; $i++) {
            $animal = new $className();

            if (!$animal instanceof Animal) {
                throw new \RuntimeException("Класс $animal не является подтипом Animal");
            }

            $animals[] = $animal;
        }

        return $animals;
    }

    public static function createCows(int $count = self::DEFAULT_COUNT_COWS): array
    {
        return self::createAnimals(Cow::class, $count);
    }

    public static function createHens(int $count = self::DEFAULT_COUNT_HENS): array
    {
        return self::createAnimals(Hen::class, $count);
    }
}