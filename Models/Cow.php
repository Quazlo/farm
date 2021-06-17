<?php

namespace Models;

class Cow extends Animal
{

    protected function createStuff(): int
    {
        return rand(8, 12);
    }
}