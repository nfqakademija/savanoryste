<?php

namespace App\DataFixtures;

use App\Entity\Volunteer;
use Faker\Factory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class VolunteerFixtures extends Fixture
{
    public function generateDummyPhone()
    {
        $phone = '86'. mt_rand(1000000, 9999999);

        return $phone;
    }

    public function generateJobType()
    {
        $jobs = array('anti-war', 'natural disasters', 'hunger', 'abuse against women',
            'preventing illness', 'poverty', 'environmental');
        $jobsRandom = array_rand($jobs);

        return $jobs[$jobsRandom];
    }

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

        for ($i = 0; $i < 50; $i++) {
            $volunteer = new Volunteer();
            $volunteer->setFirstname($faker->firstName);
            $volunteer->setLastname($faker->lastName);
            $volunteer->setEmail($faker->email);
            $volunteer->setPhone($this->generateDummyPhone());
            $volunteer->setJobType($this->generateJobType());

            $manager->persist($volunteer);
        }

        $manager->flush();
    }
}
