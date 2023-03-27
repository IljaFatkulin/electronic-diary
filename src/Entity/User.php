<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User implements UserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $username = null;

    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\OneToMany(targetEntity: 'App\Entity\UserSubject', mappedBy: 'user')]
    private $subject;

    #[ORM\OneToMany(targetEntity: 'App\Entity\Mark', mappedBy: 'teacher')]
    private $mark;

    #[ORM\OneToMany(targetEntity: 'App\Entity\GroupUser', mappedBy: 'user')]
    private $group;

    #[ORM\OneToMany(targetEntity: 'App\Entity\Teacher', mappedBy: 'user')]
    private $teacher;

    public function __construct()
    {
        $this->subject = new ArrayCollection();
        $this->mark = new ArrayCollection();
        $this->group = new ArrayCollection();
        $this->teacher = new ArrayCollection();
    }
    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->username;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    /**
     * @return Collection<int, UserSubject>
     */
    public function getSubject(): Collection
    {
        return $this->subject;
    }

    public function addSubject(UserSubject $subject): self
    {
        if (!$this->subject->contains($subject)) {
            $this->subject->add($subject);
            $subject->setUser($this);
        }

        return $this;
    }

    public function removeSubject(UserSubject $subject): self
    {
        if ($this->subject->removeElement($subject)) {
            // set the owning side to null (unless already changed)
            if ($subject->getUser() === $this) {
                $subject->setUser(null);
            }
        }

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
            $mark->setTeacher($this);
        }

        return $this;
    }

    public function removeMark(Mark $mark): self
    {
        if ($this->mark->removeElement($mark)) {
            // set the owning side to null (unless already changed)
            if ($mark->getTeacher() === $this) {
                $mark->setTeacher(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, GroupUser>
     */
    public function getGroup(): Collection
    {
        return $this->group;
    }

    public function addGroup(GroupUser $group): self
    {
        if (!$this->group->contains($group)) {
            $this->group->add($group);
            $group->setUser($this);
        }

        return $this;
    }

    public function removeGroup(GroupUser $group): self
    {
        if ($this->group->removeElement($group)) {
            // set the owning side to null (unless already changed)
            if ($group->getUser() === $this) {
                $group->setUser(null);
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
            $teacher->setUser($this);
        }

        return $this;
    }

    public function removeTeacher(Teacher $teacher): self
    {
        if ($this->teacher->removeElement($teacher)) {
            // set the owning side to null (unless already changed)
            if ($teacher->getUser() === $this) {
                $teacher->setUser(null);
            }
        }

        return $this;
    }
}
