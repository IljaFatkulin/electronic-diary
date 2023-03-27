<?php

namespace App\Entity;

use App\Repository\UserSubjectRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserSubjectRepository::class)]
class UserSubject
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: 'App\Entity\User', inversedBy: 'subject')]
    private $user;

    #[ORM\ManyToOne(targetEntity: 'App\Entity\Subject', inversedBy: 'user')]
    private $subject;

    #[ORM\OneToMany(targetEntity: 'App\Entity\Mark', mappedBy: 'user_subject')]
    private $mark;

    public function __construct()
    {
        $this->mark = new ArrayCollection();
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
     * @return Collection<int, Mark>
     */
    public function getMark(): Collection
    {
        return $this->mark;
    }

    public function addMark(Mark $mark): self
    {
        if (!$this->mark->contains($mark)) {
            $this->mark->add($mark);
            $mark->setUserSubject($this);
        }

        return $this;
    }

    public function removeMark(Mark $mark): self
    {
        if ($this->mark->removeElement($mark)) {
            // set the owning side to null (unless already changed)
            if ($mark->getUserSubject() === $this) {
                $mark->setUserSubject(null);
            }
        }

        return $this;
    }
}
