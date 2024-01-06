<?php

namespace App\DataFixtures;

use App\Entity\Bike;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BikeFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $bike = new Bike();
        $bike->setTitle('My bike');
        $bike->setType('mountain');
        $bike->setBrand('Huffy');
        $bike->setMaterial('aluminum');
        $manager->persist($bike);

        $manager->flush();
    }
}
