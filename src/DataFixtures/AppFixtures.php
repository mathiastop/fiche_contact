<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $departments = array(
            'Direction' => 'direction@mail.com',
            'Ressources Humaines' => 'rh@mail.com',
            'Communication' => 'com@mail.com',
            'Développement' => 'dev@mail.com',
        );

        $manager->flush();
    }
}
