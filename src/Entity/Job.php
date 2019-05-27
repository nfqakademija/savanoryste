<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\JobRepository")
 */
class Job
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Volunteer", inversedBy="jobs")
     */
    private $volunteer;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\JobType", inversedBy="jobs")
     */
    private $job_type;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVolunteer(): ?Volunteer
    {
        return $this->volunteer;
    }

    public function setVolunteer(?Volunteer $volunteer): self
    {
        $this->volunteer = $volunteer;

        return $this;
    }

    public function getJobType(): ?JobType
    {
        return $this->job_type;
    }

    public function setJobType(?JobType $job_type): self
    {
        $this->job_type = $job_type;

        return $this;
    }
}
