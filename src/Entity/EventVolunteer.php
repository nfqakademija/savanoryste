<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EventVolunteerRepository")
 */
class EventVolunteer
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $event_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $volunteer_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEventId(): ?int
    {
        return $this->event_id;
    }

    public function setEventId(int $event_id): self
    {
        $this->event_id = $event_id;

        return $this;
    }

    public function getVolunteerId(): ?int
    {
        return $this->volunteer_id;
    }

    public function setVolunteerId(int $volunteer_id): self
    {
        $this->volunteer_id = $volunteer_id;

        return $this;
    }
}
