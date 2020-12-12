<?php

namespace App\Entity;

use App\Repository\ShowConcertRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ShowConcertRepository::class)
 */
class ShowConcert
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $tour_name;

    /**
     * @ORM\ManyToOne(targetEntity=Band::class, inversedBy="show_concerts")
     * @ORM\JoinColumn(nullable=false)
     */
    // OneToOne
    private $band;

    /**
     * @ORM\ManyToOne(targetEntity=Hall::class, inversedBy="show_concerts")
     * @ORM\JoinColumn(nullable=false)
     */
    //ManyToMany
    private $hall;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getTourName(): ?string
    {
        return $this->tour_name;
    }

    public function setTourName(?string $tour_name): self
    {
        $this->tour_name = $tour_name;

        return $this;
    }

    public function getBand(): ?Band
    {
        return $this->band;
    }

    public function setBand(?Band $band): self
    {
        $this->band = $band;

        return $this;
    }

    public function getHall(): ?Hall
    {
        return $this->hall;
    }

    public function setHall(?Hall $hall): self
    {
        $this->hall = $hall;

        return $this;
    }

    // collections dans le corrigé de la prof
}
