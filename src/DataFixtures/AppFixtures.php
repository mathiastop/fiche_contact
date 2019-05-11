<?php

namespace App\DataFixtures;

use App\Entity\Direction;
use App\Entity\Rh;
use App\Entity\Communication;
use App\Entity\Developpement;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $direction = new Direction();
        $direction->setName('Direction');
        $direction->setMail('dir@mail.com');
        $manager->persist($direction);

        $rh = new Rh();
        $rh->setName('Ressources Humaines');
        $rh->setMail('rh@mail.com');
        $manager->persist($rh);

        $communication = new Communication();
        $communication->setName('Communication');
        $communication->setMail('com@mail.com');
        $manager->persist($communication);

        $developpement = new Developpement();
        $developpement->setName('Développement');
        $developpement->setMail('dev@mail.com');
        $manager->persist($developpement);

        $manager->flush();
    }
}
