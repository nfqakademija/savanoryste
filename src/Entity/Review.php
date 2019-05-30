<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ReviewRepository")
 */
class Review
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
    private $review_body;

    /**
     * @ORM\Column(type="integer")
     */
    private $review_rating;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Volunteer", inversedBy="reviews")
     * @ORM\JoinColumn(name="volunteer_id", referencedColumnName="id")
     */
    private $volunteer;

    /**
     * @ORM\Column(type="integer")
     */
    private $volunteer_id;

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
    public function getReviewBody(): ?string
    {
        return $this->review_body;
    }

    /**
     * @param string $review_body
     * @return Review
     */
    public function setReviewBody(string $review_body): self
    {
        $this->review_body = $review_body;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getReviewRating(): ?int
    {
        return $this->review_rating;
    }

    /**
     * @param int $review_rating
     * @return Review
     */
    public function setReviewRating(int $review_rating): self
    {
        $this->review_rating = $review_rating;

        return $this;
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
     * @return Review
     */
    public function setVolunteer(?Volunteer $volunteer): self
    {
        $this->volunteer = $volunteer;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getVolunteerId(): ?int
    {
        return $this->volunteer_id;
    }

    /**
     * @param int $volunteer_id
     * @return Review
     */
    public function setVolunteerId(int $volunteer_id): self
    {
        $this->volunteer_id = $volunteer_id;

        return $this;
    }
}
