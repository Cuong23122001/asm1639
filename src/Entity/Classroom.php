<?php

namespace App\Entity;

use App\Repository\ClassroomRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClassroomRepository::class)]
class Classroom
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 30)]
    private $tutor;

    #[ORM\Column(type: 'string', length: 20)]
    private $classname;

    #[ORM\ManyToMany(targetEntity: Teacher::class, inversedBy: 'classrooms')]
    private $teacher_name;

    public function __construct()
    {
        $this->teacher_name = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTutor(): ?string
    {
        return $this->tutor;
    }

    public function setTutor(string $tutor): self
    {
        $this->tutor = $tutor;

        return $this;
    }

    public function getClassName(): ?string
    {
        return $this->classname;
    }

    public function setClassName(string $classname): self
    {
        $this->classname = $classname;

        return $this;
    }

    /**
     * @return Collection|Teacher[]
     */
    public function getTeacherName(): Collection
    {
        return $this->teachername;
    }

    public function addTeacherName(Teacher $teacherName): self
    {
        if (!$this->teachername->contains($teacherName)) {
            $this->teachername[] = $teacherName;
        }

        return $this;
    }

    public function removeTeacherName(Teacher $teacherName): self
    {
        $this->teacher_name->removeElement($teacherName);

        return $this;
    }
}
