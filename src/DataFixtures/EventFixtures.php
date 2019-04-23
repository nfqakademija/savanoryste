<?php

namespace App\DataFixtures;

use App\Entity\Event;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Faker\Factory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class EventFixtures extends Fixture implements OrderedFixtureInterface
{


    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

        for ($i = 0; $i < 50; $i++) {
            $event = new Event();
            $event->setTitle($faker->sentence(6));
            $event->setStartDate($faker->dateTimeThisMonth);
            $event->setEndDate($faker->dateTimeThisMonth);
            $event->setDescription($faker->paragraph(3));
            $event->setOrganisation($this->getReference('organisation-' . $i));

            $manager->persist($event);
        }

        $manager->flush();
    }

    public function getOrder()
    {
        return 200;
    }
}
