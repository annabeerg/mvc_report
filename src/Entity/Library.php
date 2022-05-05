<?php

namespace App\Entity;

use App\Repository\LibraryRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LibraryRepository::class)]
class Library
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $namn;

    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $titel;

    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $ISBN;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $bild;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNamn(): ?string
    {
        return $this->namn;
    }

    public function setNamn(?string $namn): self
    {
        $this->namn = $namn;

        return $this;
    }

    public function getTitel(): ?string
    {
        return $this->titel;
    }

    public function setTitel(?string $titel): self
    {
        $this->titel = $titel;

        return $this;
    }

    public function getISBN(): ?string
    {
        return $this->ISBN;
    }

    public function setISBN(string $ISBN): self
    {
        $this->ISBN = $ISBN;

        return $this;
    }

    public function getBild(): ?string
    {
        return $this->bild;
    }

    public function setBild(string $bild): self
    {
        $this->bild = $bild;

        return $this;
    }
}
