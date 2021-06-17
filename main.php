<?php

require_once(__DIR__ . '/psr4autoloader.php');

$loader = new Psr4AutoloaderClass();
$loader->addNamespace('Models', __DIR__ . '/Models');
$loader->addNamespace('Factory', __DIR__ . '/Factory');
$loader->addNamespace('Collections', __DIR__ . '/Collections');
$loader->register();

$collection = new \Collections\Barn();

$collection->addAnimals(\Factory\AnimalFactory::createCows());
$collection->addAnimals(\Factory\AnimalFactory::createHens());

//echo 'Наши животные: ' . \print_r($collection->getAnimals(), true);

$farm = new Models\Farm($collection);
$farm->start();