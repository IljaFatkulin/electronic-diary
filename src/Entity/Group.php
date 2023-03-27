<?php

namespace App\Entity;

use App\Repository\GroupRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GroupRepository::class)]
#[ORM\Table(name: '`group`')]
class Group
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(targetEntity: 'App\Entity\GroupUser', mappedBy: 'group')]
    private $user;

    #[ORM\OneToMany(targetEntity: 'App\Entity\Timetable', mappedBy: 'group')]
    private $timetable;

    public function __construct()
    {
        $this->user = new ArrayCollection();
        $this->timetable = new ArrayCollection();
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

    /**
     * @return Collection<int, GroupUser>
     */
    public function getUser(): Collection
    {
        return $this->user;
    }

    public function addUser(GroupUser $user): self
    {
        if (!$this->user->contains($user)) {
            $this->user->add($user);
            $user->setGroup($this);
        }

        return $this;
    }

    public function removeUser(GroupUser $user): self
    {
        if ($this->user->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getGroup() === $this) {
                $user->setGroup(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Timetable>
     */
    public function getTimetable(): Collection
    {
        return $this->timetable;
    }

    public function addTimetable(Timetable $timetable): self
    {
        if (!$this->timetable->contains($timetable)) {
            $this->timetable->add($timetable);
            $timetable->setGroup($this);
        }

        return $this;
    }

    public function removeTimetable(Timetable $timetable): self
    {
        if ($this->timetable->removeElement($timetable)) {
            // set the owning side to null (unless already changed)
            if ($timetable->getGroup() === $this) {
                $timetable->setGroup(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->name;
    }
}
