<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\InviteRepository")
 */
class Invite
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank()
     */
    private $user_id;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank()
     */
    private $event_id;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank()
     */
    private $organisation_id;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return int|null
     */
    public function getUserId(): ?int
    {
        return $this->user_id;
    }

    /**
     * @param int $user_id
     * @return Invite
     */
    public function setUserId(int $user_id): self
    {
        $this->user_id = $user_id;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getEventId(): ?int
    {
        return $this->event_id;
    }

    /**
     * @param int $event_id
     * @return Invite
     */
    public function setEventId(int $event_id): self
    {
        $this->event_id = $event_id;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getOrganisationId(): ?int
    {
        return $this->organisation_id;
    }

    /**
     * @param int $organisation_id
     * @return Invite
     */
    public function setOrganisationId(int $organisation_id): self
    {
        $this->organisation_id = $organisation_id;

        return $this;
    }
}
