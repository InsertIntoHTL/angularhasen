<?php

namespace App\Entity;

use App\Repository\TournamentEntry1Repository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TournamentEntry1Repository::class)
 */
class TournamentEntry1
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $traveldistance;

    /**
     * @ORM\Column(type="float")
     */
    private $flightduration;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $paperplane_model;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $participant_name;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTraveldistance(): ?float
    {
        return $this->traveldistance;
    }

    public function setTraveldistance(float $traveldistance): self
    {
        $this->traveldistance = $traveldistance;

        return $this;
    }

    public function getFlightduration(): ?float
    {
        return $this->flightduration;
    }

    public function setFlightduration(float $flightduration): self
    {
        $this->flightduration = $flightduration;

        return $this;
    }

    public function getPaperplaneModel(): ?string
    {
        return $this->paperplane_model;
    }

    public function setPaperplaneModel(string $paperplane_model): self
    {
        $this->paperplane_model = $paperplane_model;

        return $this;
    }

    public function getParticipantName(): ?string
    {
        return $this->participant_name;
    }

    public function setParticipantName(string $participant_name): self
    {
        $this->participant_name = $participant_name;

        return $this;
    }

    public function getDate(): ?string
    {
        return $this->date->format('Y-m-d H:i');
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }
}
