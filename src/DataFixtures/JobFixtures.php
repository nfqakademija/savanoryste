<?php

namespace App\DataFixtures;

use App\Entity\Job;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class JobFixtures extends Fixture implements OrderedFixtureInterface
{

    private function generateJobType()
    {
        $jobs = array('anti-war', 'natural disasters', 'hunger', 'abuse against women',
            'preventing illness', 'poverty', 'environmental');
        $jobsRandom = array_rand($jobs);

        return $jobs[$jobsRandom];
    }

    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 50; $i++) {
            $job = new Job();
            $job->setJobType($this->generateJobType());
            $job->setVolunteer($this->getReference('volunteer-' . $i));

            $manager->persist($job);
        }

        $manager->flush();
    }

    public function getOrder()
    {
        return 400;
    }
}
