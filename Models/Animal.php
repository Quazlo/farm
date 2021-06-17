<?php

namespace Models;

abstract class Animal
{
    protected int $stuff;

    public function __construct()
    {
        $this->stuff = $this->createStuff();
    }

    public function getStuff(): int
    {
        return $this->stuff;
    }

    abstract protected function createStuff(): int;
}