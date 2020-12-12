<?php

namespace App\Entity;

use App\Repository\HallRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HallRepository::class)
 */
class Hall
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $capacity;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $available;

    /**
     * @ORM\OneToMany(targetEntity=ConcertHall::class, mappedBy="hall")
     */
    private $concert_halls;

    /**
     * @ORM\OneToMany(targetEntity=ShowConcert::class, mappedBy="hall")
     */
    private $show_concerts;

    public function __construct()
    {
        $this->concert_halls = new ArrayCollection();
        $this->show_concerts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getCapacity(): ?int
    {
        return $this->capacity;
    }

    public function setCapacity(?int $capacity): self
    {
        $this->capacity = $capacity;

        return $this;
    }

    public function getAvailable(): ?bool
    {
        return $this->available;
    }

    public function setAvailable(?bool $available): self
    {
        $this->available = $available;

        return $this;
    }

    /**
     * @return Collection|ConcertHall[]
     */
    public function getConcertHalls(): Collection
    {
        return $this->concert_halls;
    }

    public function addConcertHall(concerthall $concertHall): self
    {
        if (!$this->concert_halls->contains($concertHall)) {
            $this->concert_halls[] = $concertHall;
            $concertHall->setHall($this);
        }

        return $this;
    }

    public function removeConcertHall(concerthall $concertHall): self
    {
        if ($this->concert_halls->removeElement($concertHall)) {
            // set the owning side to null (unless already changed)
            if ($concertHall->getHall() === $this) {
                $concertHall->setHall(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ShowConcert[]
     */
    public function getShowConcerts(): Collection
    {
        return $this->show_concerts;
    }

    public function addShowConcert(showconcert $showConcert): self
    {
        if (!$this->show_concerts->contains($showConcert)) {
            $this->show_concerts[] = $showConcert;
            $showConcert->setHall($this);
        }

        return $this;
    }

    public function removeShowConcert(showconcert $showConcert): self
    {
        if ($this->show_concerts->removeElement($showConcert)) {
            // set the owning side to null (unless already changed)
            if ($showConcert->getHall() === $this) {
                $showConcert->setHall(null);
            }
        }

        return $this;
    }
}
