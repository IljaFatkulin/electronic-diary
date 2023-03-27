<?php

namespace App\Entity;

use App\Repository\TeacherRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TeacherRepository::class)]
class Teacher
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: 'App\Entity\User', inversedBy: 'teacher')]
    private $user;

    #[ORM\ManyToOne(targetEntity: 'App\Entity\Subject', inversedBy: 'teacher')]
    private $subject;

    #[ORM\OneToMany(targetEntity: 'App\Entity\Timetable', mappedBy: 'teacher')]
    private $timetable;

    public function __construct()
    {
        $this->timetable = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getSubject(): ?Subject
    {
        return $this->subject;
    }

    public function setSubject(?Subject $subject): self
    {
        $this->subject = $subject;

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
            $timetable->setTeacher($this);
        }

        return $this;
    }

    public function removeTimetable(Timetable $timetable): self
    {
        if ($this->timetable->removeElement($timetable)) {
            // set the owning side to null (unless already changed)
            if ($timetable->getTeacher() === $this) {
                $timetable->setTeacher(null);
            }
        }

        return $this;
    }

    public function __toString() {
        return $this->user->getUserName();
    }
}
