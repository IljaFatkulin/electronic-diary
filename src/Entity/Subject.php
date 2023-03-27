<?php

namespace App\Entity;

use App\Repository\SubjectRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SubjectRepository::class)]
class Subject
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(targetEntity: 'App\Entity\UserSubject', mappedBy: 'subject')]
    private $user;

    #[ORM\OneToMany(targetEntity: 'App\Entity\Teacher', mappedBy: 'teacher')]
    private $teacher;

    #[ORM\OneToMany(targetEntity: 'App\Entity\Timetable', mappedBy: 'subject')]
    private $timetable;

    public function __construct()
    {
        $this->user = new ArrayCollection();
        $this->teacher = new ArrayCollection();
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

    public function __toString(): string
    {
        return $this->name;
    }

    /**
     * @return Collection<int, UserSubject>
     */
    public function getUser(): Collection
    {
        return $this->user;
    }

    public function addUser(UserSubject $user): self
    {
        if (!$this->user->contains($user)) {
            $this->user->add($user);
            $user->setSubject($this);
        }

        return $this;
    }

    public function removeUser(UserSubject $user): self
    {
        if ($this->user->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getSubject() === $this) {
                $user->setSubject(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Teacher>
     */
    public function getTeacher(): Collection
    {
        return $this->teacher;
    }

    public function addTeacher(Teacher $teacher): self
    {
        if (!$this->teacher->contains($teacher)) {
            $this->teacher->add($teacher);
            $teacher->setTeacher($this);
        }

        return $this;
    }

    public function removeTeacher(Teacher $teacher): self
    {
        if ($this->teacher->removeElement($teacher)) {
            // set the owning side to null (unless already changed)
            if ($teacher->getTeacher() === $this) {
                $teacher->setTeacher(null);
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
            $timetable->setSubject($this);
        }

        return $this;
    }

    public function removeTimetable(Timetable $timetable): self
    {
        if ($this->timetable->removeElement($timetable)) {
            // set the owning side to null (unless already changed)
            if ($timetable->getSubject() === $this) {
                $timetable->setSubject(null);
            }
        }

        return $this;
    }
}
