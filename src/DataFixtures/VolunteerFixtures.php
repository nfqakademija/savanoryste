<?php

namespace App\DataFixtures;

use App\Entity\Volunteer;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Faker\Factory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class VolunteerFixtures extends Fixture implements OrderedFixtureInterface
{
    private function generateDummyPhone()
    {
        $phone = '86'. mt_rand(1000000, 9999999);

        return $phone;
    }

    private function generateDescription()
    {
        $descriptions = [
            'Hard Working',
            'Always on Time',
            'Polite',
            'Willing to put in extra effort',
            'Have been volunteering for the past year',
            'Experienced',
            'Easy Out going'
        ];
        $descriptionsRandom = array_rand($descriptions);
        return $descriptions[$descriptionsRandom];
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
            $volunteer->setCity($faker->city);
            $volunteer->setCountry($faker->country);
            $volunteer->setDescription($this->generateDescription());
            $this->addReference('volunteer-' . $i, $volunteer);

            $manager->persist($volunteer);
        }

        $manager->flush();
    }

    public function getOrder()
    {
        return 300;
    }
}
