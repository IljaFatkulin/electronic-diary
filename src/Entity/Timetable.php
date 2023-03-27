<?php

namespace App\Entity;

use App\Repository\TimetableRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TimetableRepository::class)]
class Timetable
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date = null;

    #[ORM\ManyToOne(targetEntity: 'App\Entity\Group', inversedBy: 'timetable')]
    private $group;

    #[ORM\Column]
    private int $lesson;

    #[ORM\ManyToOne(targetEntity: 'App\Entity\Subject', inversedBy: 'timetable')]
    private $subject;

    #[ORM\ManyToOne(targetEntity: 'App\Entity\Teacher', inversedBy: 'teacher')]
    private $teacher;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getLesson(): ?int
    {
        return $this->lesson;
    }

    public function setLesson(int $lesson): self
    {
        $this->lesson = $lesson;

        return $this;
    }

    public function getGroup(): ?Group
    {
        return $this->group;
    }

    public function setGroup(?Group $group): self
    {
        $this->group = $group;

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

    public function getTeacher(): ?Teacher
    {
        return $this->teacher;
    }

    public function setTeacher(?Teacher $teacher): self
    {
        $this->teacher = $teacher;

        return $this;
    }
}
