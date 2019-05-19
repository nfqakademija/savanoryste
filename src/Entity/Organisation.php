<?php

namespace App\Entity;

use App\Interfaces\BlankInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OrganisationRepository")
 */
class Organisation implements BlankInterface
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
     *      minMessage = "Įmonės pavadinimas turi būti ne trumpesnis nei {{ limit }} simboliai",
     *      maxMessage = "Įmonės pavadinimas negali būti ilgesnis nei {{ limit }} simbolių"
     * )
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Email(
     *     message="El.paštas netaisingas"
     * )
     */
    private $email;

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
     * @Assert\Length(
     *      min = 2,
     *      max = 20,
     *      minMessage = "Įmonės pavadinimas turi būti ne trumpesnis nei {{ limit }} simboliai",
     *      maxMessage = "Įmonės pavadinimas negali būti ilgesnis nei {{ limit }} simbolių"
     * )
     */
    private $address;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Event", mappedBy="organisation")
     */
    private $events;

    /**
     * @ORM\Column(type="string", length=255, nullable=true, options={"default":"OrganisationPic.jpeg"})
     */
    private $ProfilePic = 'OrganisationPic.jpeg';

    public function __construct()
    {
        $this->events = new ArrayCollection();
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
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Organisation
     */
    public function setName(string $name): self
    {
        $this->name = $name;

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
     * @return Organisation
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

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
     * @return Organisation
     */
    public function setPhone(int $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }

    /**
     * @param string $address
     * @return Organisation
     */
    public function setAddress(string $address): self
    {
        $this->address = $address;

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
     * @return Organisation
     */
    public function addEvent(Event $event): self
    {
        if (!$this->events->contains($event)) {
            $this->events[] = $event;
            $event->setOrganisation($this);
        }

        return $this;
    }

    /**
     * @param Event $event
     * @return Organisation
     */
    public function removeEvent(Event $event): self
    {
        if ($this->events->contains($event)) {
            $this->events->removeElement($event);
            // set the owning side to null (unless already changed)
            if ($event->getOrganisation() === $this) {
                $event->setOrganisation(null);
            }
        }

        return $this;
    }

    public function getProfilePic(): ?string
    {
        return $this->ProfilePic;
    }

    public function setProfilePic(?string $ProfilePic): self
    {
        $this->ProfilePic = $ProfilePic;

        return $this;
    }

    /**
     * @param object $organisation
     * @return mixed
     */
    public function createEmpty(object $organisation) :void
    {
        $organisation->setName('');
        $organisation->setEmail('');
        $organisation->setPhone(0);
        $organisation->setAddress('');
    }
}
