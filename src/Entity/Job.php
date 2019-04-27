<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\Column(type="string", length=255)
     */
    private $job_type;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Volunteer", inversedBy="jobs")
     */
    private $volunteer;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJobType(): ?string
    {
        return $this->job_type;
    }

    public function setJobType(string $job_type): self
    {
        $this->job_type = $job_type;

        return $this;
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

}
