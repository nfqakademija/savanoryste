<?php

namespace App\Entity;

use App\Interfaces\BlankInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VolunteerRepository")
 */
class Volunteer implements BlankInterface
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
     *      max = 50,
     *      minMessage = "Vardas turi būti ne trumpesnis nei {{ limit }} simboliai",
     *      maxMessage = "Vardas negali būti ilgesnis nei {{ limit }} simbolių"
     * )
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min = 2,
     *      max = 255,
     *      minMessage = "Pavardė turi būti ne trumpesnis nei {{ limit }} simboliai",
     *      maxMessage = "Pavardė negali būti ilgesnis nei {{ limit }} simboliai"
     * )
     */
    private $lastname;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank()
     * @Assert\Regex(
     *     pattern="/[0-9]{8}/",
     *     match=false,
     *     message="Įveskite pilna numerį"
     * )
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Email(
     *     message="El.pašto formatas netinka"
     * )
     */
    private $email;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Review", mappedBy="volunteer")
     */
    private $reviews;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Event", inversedBy="volunteers")
     * @ORM\JoinColumn(name="event_volunteer")
     */
    private $events;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min = 2,
     *      max = 80,
     *      minMessage = "Miesto pavadinimas turi būti ne trumpesnis nei {{ limit }} simboliai",
     *      maxMessage = "Miesto pavadinimas negali būti ilgesnis nei {{ limit }} simbolių"
     * )
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min = 2,
     *      max = 80,
     *      minMessage = "Valstybės pavadinimas turi būti ne trumpesnis nei {{ limit }} simboliai",
     *      maxMessage = "Valstybės pavadinimas negali būti ilgesnis nei {{ limit }} simbolių"
     * )
     */
    private $country;

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
     * @ORM\OneToMany(targetEntity="App\Entity\Job", mappedBy="volunteer")
     */
    private $jobs;

    /**
     * @ORM\Column(type="string", length=255, nullable=true, options={"default":"VolunteerPic.jpeg"})
     */
    private $ProfilePic = 'VolunteerPic.jpeg';

    public function __construct()
    {
        $this->reviews = new ArrayCollection();
        $this->events = new ArrayCollection();
        $this->jobs = new ArrayCollection();
    }


    /**
     * @param object $volunteer
     */
    public function createEmpty(object $volunteer) :void
    {
        $volunteer->setFirstname('');
        $volunteer->setLastname('');
        $volunteer->setPhone(0);
        $volunteer->setEmail('');
        $volunteer->setCity('');
        $volunteer->setCountry('');
        $volunteer->setDescription('');
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
    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     * @return Volunteer
     */
    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     * @return Volunteer
     */
    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getPhone(): ?int
    {
        return $this->phone;
    }

    /**
     * @param int $phone
     * @return Volunteer
     */
    public function setPhone(int $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return Volunteer
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return Collection|Review[]
     */
    public function getReviews(): Collection
    {
        return $this->reviews;
    }

    /**
     * @param Review $review
     * @return Volunteer
     */
    public function addReview(Review $review): self
    {
        if (!$this->reviews->contains($review)) {
            $this->reviews[] = $review;
            $review->setVolunteer($this);
        }

        return $this;
    }

    /**
     * @param Review $review
     * @return Volunteer
     */
    public function removeReview(Review $review): self
    {
        if ($this->reviews->contains($review)) {
            $this->reviews->removeElement($review);
            // set the owning side to null (unless already changed)
            if ($review->getVolunteer() === $this) {
                $review->setVolunteer(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Event[]
     */
    public function getEvents(): Collection
    {
        return $this->events;
    }

    /**
     * @param Event $event
     * @return Volunteer
     */
    public function addEvent(Event $event): self
    {
        if (!$this->events->contains($event)) {
            $this->events[] = $event;
        }

        return $this;
    }

    /**
     * @param Event $event
     * @return Volunteer
     */
    public function removeEvent(Event $event): self
    {
        if ($this->events->contains($event)) {
            $this->events->removeElement($event);
        }

        return $this;
    }

    /**
     * @return null|string
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * @param string $city
     * @return Volunteer
     */
    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getCountry(): ?string
    {
        return $this->country;
    }

    /**
     * @param string $country
     * @return Volunteer
     */
    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
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
     * @return Volunteer
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection|Job[]
     */
    public function getJobs(): Collection
    {
        return $this->jobs;
    }

    /**
     * @param Job $job
     * @return Volunteer
     */
    public function addJob(Job $job): self
    {
        if (!$this->jobs->contains($job)) {
            $this->jobs[] = $job;
            $job->setVolunteer($this);
        }

        return $this;
    }

    /**
     * @param Job $job
     * @return Volunteer
     */
    public function removeJob(Job $job): self
    {
        if ($this->jobs->contains($job)) {
            $this->jobs->removeElement($job);
            // set the owning side to null (unless already changed)
            if ($job->getVolunteer() === $this) {
                $job->setVolunteer(null);
            }
        }

        return $this;
    }

    /**
     * @return null|string
     */
    public function getProfilePic(): ?string
    {
        return $this->ProfilePic;
    }

    /**
     * @param null|string $ProfilePic
     * @return Volunteer
     */
    public function setProfilePic(?string $ProfilePic): self
    {
        $this->ProfilePic = $ProfilePic;

        return $this;
    }
}
