<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EventRepository")
 */
class Event
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min = 2,
     *      max = 100,
     *      minMessage = "Renginio pavadinimas turi būti ne trumpesnis nei {{ limit }} simboliai",
     *      maxMessage = "Renginio pavadinimas negali būti ilgesnis nei {{ limit }} simbolių"
     * )
     */
    private $title;

    /**
     * @ORM\Column(type="datetime")
     * @Assert\NotBlank()
     */
    private $start_date;

    /**
     * @ORM\Column(type="datetime")
     * @Assert\NotBlank()
     */
    private $end_date;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min = 2,
     *      max = 500,
     *      minMessage = "Aprašymas turi būti ne trumpesnis nei {{ limit }} simboliai",
     *      maxMessage = "Aprašymas negali būti ilgesnis nei {{ limit }} simbolių"
     * )
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Organisation", inversedBy="events")
     * @ORM\JoinColumn(name="organisation_id", referencedColumnName="id")
     */
    private $organisation;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Volunteer", mappedBy="events")
     */
    private $volunteers;

    public function __construct()
    {
        $this->volunteers = new ArrayCollection();
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return null|string
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Event
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getStartDate()
    {
        return $this->start_date;
    }

    /**
     * @param mixed $start_date
     */
    public function setStartDate($start_date): void
    {
        $this->start_date = $start_date;
    }

    /**
     * @return mixed
     */
    public function getEndDate()
    {
        return $this->end_date;
    }

    /**
     * @param mixed $end_date
     */
    public function setEndDate($end_date): void
    {
        $this->end_date = $end_date;
    }






    /**
     * @return null|string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Event
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Organisation|null
     */
    public function getOrganisation(): ?Organisation
    {
        return $this->organisation;
    }

    /**
     * @param Organisation|null $organisation
     * @return Event
     */
    public function setOrganisation(?Organisation $organisation): self
    {
        $this->organisation = $organisation;

        return $this;
    }

    /**
     * @return Collection|Volunteer[]
     */
    public function getVolunteers(): Collection
    {
        return $this->volunteers;
    }

    /**
     * @param Volunteer $volunteer
     * @return Event
     */
    public function addVolunteer(Volunteer $volunteer): self
    {
        if (!$this->volunteers->contains($volunteer)) {
            $this->volunteers[] = $volunteer;
            $volunteer->addEvent($this);
        }

        return $this;
    }

    /**
     * @param Volunteer $volunteer
     * @return Event
     */
    public function removeVolunteer(Volunteer $volunteer): self
    {
        if ($this->volunteers->contains($volunteer)) {
            $this->volunteers->removeElement($volunteer);
            $volunteer->removeEvent($this);
        }

        return $this;
    }
}
