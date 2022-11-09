<?php

namespace App\Entity;

use App\Repository\CountryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CountryRepository::class)]
class Country
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $country = null;

    #[ORM\Column]
    private ?float $lat = null;

    #[ORM\Column]
    private ?float $longt = null;

    #[ORM\OneToMany(mappedBy: 'country', targetEntity: State::class)]
    private Collection $states;

    public function __construct()
    {
        $this->states = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getLat(): ?float
    {
        return $this->lat;
    }

    public function setLat(float $lat): self
    {
        $this->lat = $lat;

        return $this;
    }

    public function getLongt(): ?float
    {
        return $this->longt;
    }

    public function setLongt(float $longt): self
    {
        $this->longt = $longt;

        return $this;
    }

    /**
     * @return Collection<int, State>
     */
    public function getStates(): Collection
    {
        return $this->states;
    }

    public function addState(State $state): self
    {
        if (!$this->states->contains($state)) {
            $this->states->add($state);
            $state->setCountry($this);
        }

        return $this;
    }

    public function removeState(State $state): self
    {
        if ($this->states->removeElement($state)) {
            // set the owning side to null (unless already changed)
            if ($state->getCountry() === $this) {
                $state->setCountry(null);
            }
        }

        return $this;
    }
}
