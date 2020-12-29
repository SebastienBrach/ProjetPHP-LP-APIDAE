<?php

namespace App\Entity;

use App\Repository\BandRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BandRepository::class)
 */
class Band
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
     * @ORM\Column(type="string", length=255)
     */
    private $style;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $picture;

    /**
     * @ORM\Column(type="date")
     */
    private $year_of_creation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $last_album_name;

    /**
     * @ORM\OneToMany(targetEntity=Member::class, mappedBy="band")
     */
    private $members;

    /**
     * @ORM\OneToMany(targetEntity=ShowConcert::class, mappedBy="band")
     */
    // ManyToMany
    private $show_concerts;

    public function __construct()
    {
        $this->members = new ArrayCollection();
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

    public function getStyle(): ?string
    {
        return $this->style;
    }

    public function setStyle(string $style): self
    {
        $this->style = $style;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getYearOfCreation(): ?\DateTimeInterface
    {
        return $this->year_of_creation;
    }

    public function setYearOfCreation(\DateTimeInterface $year_of_creation): self
    {
        $this->year_of_creation = $year_of_creation;

        return $this;
    }

    public function getLastAlbumName(): ?string
    {
        return $this->last_album_name;
    }

    public function setLastAlbumName(?string $last_album_name): self
    {
        $this->last_album_name = $last_album_name;

        return $this;
    }

    /**
     * @return Collection|Member[]
     */
    public function getMembers(): Collection
    {
        return $this->members;
    }

    public function addMember(Member $member): self
    {
        if (!$this->members->contains($member)) {
            $this->members[] = $member;
            $member->setBand($this);
        }

        return $this;
    }

    public function removeMember(Member $member): self
    {
        if ($this->members->removeElement($member)) {
            // set the owning side to null (unless already changed)
            if ($member->getBand() === $this) {
                $member->setBand(null);
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

    public function addShowConcert(ShowConcert $showConcert): self
    {
        if (!$this->show_concerts->contains($showConcert)) {
            $this->show_concerts[] = $showConcert;
            $showConcert->setBand($this);
        }

        return $this;
    }

    public function removeShowConcert(ShowConcert $showConcert): self
    {
        if ($this->show_concerts->removeElement($showConcert)) {
            // set the owning side to null (unless already changed)
            if ($showConcert->getBand() === $this) {
                $showConcert->setBand(null);
            }
        }

        return $this;
    }

    public function __toString(){
        return $this->name;
    }
}
