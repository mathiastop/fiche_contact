<?php

namespace App\DataFixtures;

use App\Entity\Departments;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $name = array('Direction', 'Ressources Humaines', 'Communication', 'Developpement');
        $mail = array('dir@mail.com', 'rh@mail.com', 'com@mail.com', 'dev@mail.com');

        for ($i = 0; $i < 4; $i++) {
            $department = new Departments();
            $department->setName($name[$i]);
            $department->setMail($mail[$i]);
            $manager->persist($department);
        }
        $manager->flush();
    }
}
