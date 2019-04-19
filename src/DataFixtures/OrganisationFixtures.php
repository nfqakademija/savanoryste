<?php

namespace App\DataFixtures;

use App\Entity\Organisation;
use Faker\Factory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class OrganisationFixtures extends Fixture
{
    public function generateDummyPhone()
    {
        $phone = '86'. mt_rand(1000000, 9999999);

        return $phone;
    }

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

        for ($i = 0; $i < 50; $i++) {
            $organisation = new Organisation();
            $organisation->setName($faker->company);
            $organisation->setEmail($faker->companyEmail);
            $organisation->setPhone($this->generateDummyPhone());
            $organisation->setAddress($faker->address);

            $manager->persist($organisation);
        }

        $manager->flush();
    }
}
