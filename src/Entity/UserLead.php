<?php

namespace App\Entity;

use App\Repository\UserLeadRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserLeadRepository::class)]
class UserLead
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToMany(targetEntity: User::class, inversedBy: 'userLeads', cascade:["persist"])]
    private Collection $user;

    #[ORM\ManyToMany(targetEntity: Lead::class, inversedBy: 'userLeads', cascade:["persist"])]
    private Collection $leadd;

    public function __construct()
    {
        $this->user = new ArrayCollection();
        $this->leadd = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUser(): Collection
    {
        return $this->user;
    }

    public function addUser(User $user): self
    {
        if (!$this->user->contains($user)) {
            $this->user->add($user);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        $this->user->removeElement($user);

        return $this;
    }

    /**
     * @return Collection<int, Lead>
     */
    public function getLeadd(): Collection
    {
        return $this->leadd;
    }

    public function addLeadd(Lead $leadd): self
    {
        if (!$this->leadd->contains($leadd)) {
            $this->leadd->add($leadd);
        }

        return $this;
    }

    public function removeLeadd(Lead $leadd): self
    {
        $this->leadd->removeElement($leadd);

        return $this;
    }
}
