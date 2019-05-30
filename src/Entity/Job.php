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


    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Volunteer|null
     */
    public function getVolunteer(): ?Volunteer
    {
        return $this->volunteer;
    }

    /**
     * @param Volunteer|null $volunteer
     * @return Job
     */
    public function setVolunteer(?Volunteer $volunteer): self
    {
        $this->volunteer = $volunteer;

        return $this;
    }

    /**
     * @return JobType|null
     */
    public function getJobType(): ?JobType
    {
        return $this->job_type;
    }

    /**
     * @param JobType|null $job_type
     * @return Job
     */
    public function setJobType(?JobType $job_type): self
    {
        $this->job_type = $job_type;

        return $this;
    }
}
