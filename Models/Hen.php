<?php

namespace Models;


class Hen extends Animal
{

    protected function createStuff(): int
    {
        return rand(0, 1);
    }
}