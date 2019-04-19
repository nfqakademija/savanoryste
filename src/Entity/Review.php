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
     */
    private $volunteer;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReviewBody(): ?string
    {
        return $this->review_body;
    }

    public function setReviewBody(string $review_body): self
    {
        $this->review_body = $review_body;

        return $this;
    }

    public function getReviewRating(): ?int
    {
        return $this->review_rating;
    }

    public function setReviewRating(int $review_rating): self
    {
        $this->review_rating = $review_rating;

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
