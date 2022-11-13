<?php

namespace App\Entity;

use App\Repository\LeadRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LeadRepository::class)]
#[ORM\Table(name: '`lead`')]
class Lead
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $first_name = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $last_name = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $company = null;

    #[ORM\Column(length: 50)]
    private ?string $email = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $img = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $street = null;

    #[ORM\Column(nullable: true)]
    private ?int $id_state = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $city = null;

    #[ORM\Column(nullable: true)]
    private ?int $id_country = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $postal_code = null;

    #[ORM\ManyToMany(targetEntity: UserLead::class, mappedBy: 'leadd')]
    private Collection $userLeads;

    public function __construct()
    {
        $this->userLeads = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->first_name;
    }

    public function setFirstName(?string $first_name): self
    {
        $this->first_name = $first_name;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->last_name;
    }

    public function setLastName(?string $last_name): self
    {
        $this->last_name = $last_name;

        return $this;
    }

    public function getCompany(): ?string
    {
        return $this->company;
    }

    public function setCompany(string $company): self
    {
        $this->company = $company;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getImg(): ?string
    {
        return $this->img;
    }

    public function setImg(?string $img): self
    {
        $this->img = $img;

        return $this;
    }

    public function getStreet(): ?string
    {
        return $this->street;
    }

    public function setStreet(?string $street): self
    {
        $this->street = $street;

        return $this;
    }

    public function getIdState(): ?int
    {
        return $this->id_state;
    }

    public function setIdState(int $id_state): self
    {
        $this->id_state = $id_state;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getIdCountry(): ?int
    {
        return $this->id_country;
    }

    public function setIdCountry(int $id_country): self
    {
        $this->id_country = $id_country;

        return $this;
    }

    public function getPostalCode(): ?string
    {
        return $this->postal_code;
    }

    public function setPostalCode(?string $postal_code): self
    {
        $this->postal_code = $postal_code;

        return $this;
    }

    /**
     * @return Collection<int, UserLead>
     */
    public function getUserLeads(): Collection
    {
        return $this->userLeads;
    }

    public function addUserLead(UserLead $userLead): self
    {
        if (!$this->userLeads->contains($userLead)) {
            $this->userLeads->add($userLead);
            $userLead->addLeadd($this);
        }

        return $this;
    }

    public function removeUserLead(UserLead $userLead): self
    {
        if ($this->userLeads->removeElement($userLead)) {
            $userLead->removeLeadd($this);
        }

        return $this;
    }
}
