<?php

namespace App\DataFixtures;

use App\Entity\Review;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Faker\Factory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ReviewFixtures extends Fixture implements OrderedFixtureInterface
{


    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

        for ($i = 0; $i < 50; $i++) {
            $review = new Review();
            $review->setReviewBody($faker->text(100));
            $review->setReviewRating($faker->numberBetween(1, 10));
            $review->setVolunteer($this->getReference('volunteer-' . $i));
            $manager->persist($review);
        }

        $manager->flush();
    }

    public function getOrder()
    {
        return 400;
    }
}
