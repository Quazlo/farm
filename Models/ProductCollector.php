<?php

namespace Models;

use Collections\Barn;

/**
 * @uses ProductCollector
 */
class ProductCollector
{
    public static function collectProducts(Barn $animals): void
    {
        $eggs = 0;
        $milk = 0;

        /** @var Animal $animal */
        foreach ($animals->getAnimals() as $animal) {
            $stuff = $animal->getStuff();

            switch ($animal) {
                case $animal instanceof Cow:
                    $milk += $stuff;
                    break;
                case  $animal instanceof Hen:
                    $eggs += $stuff;
                    break;
            }
        }

        echo "Собрали $eggs яиц и $milk литров молока!";
    }
}