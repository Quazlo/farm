<?php

namespace Models;

use Collections\Barn;

class Farm
{
    /**
     * @var Barn
     */
    private Barn $animals;

    public function __construct(Barn $animals)
    {
        $this->animals = $animals;
    }

    public function start(): void
    {
        ProductCollector::collectProducts($this->animals);
    }
}