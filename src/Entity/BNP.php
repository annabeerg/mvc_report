<?php

namespace App\Entity;

use App\Repository\BNPRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BNPRepository::class)]
class BNP
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $field;

    #[ORM\Column(type: 'string', length: 255)]
    private $eight;

    #[ORM\Column(type: 'string', length: 255)]
    private $nine;

    #[ORM\Column(type: 'string', length: 255)]
    private $ten;

    #[ORM\Column(type: 'string', length: 255)]
    private $eleven;

    #[ORM\Column(type: 'string', length: 255)]
    private $twelve;

    #[ORM\Column(type: 'string', length: 255)]
    private $thirteen;

    #[ORM\Column(type: 'string', length: 255)]
    private $fourteen;

    #[ORM\Column(type: 'string', length: 255)]
    private $fifteen;

    #[ORM\Column(type: 'string', length: 255)]
    private $sixteen;

    #[ORM\Column(type: 'string', length: 255)]
    private $seventeen;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getField(): ?string
    {
        return $this->field;
    }

    public function setField(string $field): self
    {
        $this->field = $field;

        return $this;
    }

    public function getEight(): ?string
    {
        return $this->eight;
    }

    public function setEight(string $eight): self
    {
        $this->eight = $eight;

        return $this;
    }

    public function getNine(): ?string
    {
        return $this->nine;
    }

    public function setNine(string $nine): self
    {
        $this->nine = $nine;

        return $this;
    }

    public function getTen(): ?string
    {
        return $this->ten;
    }

    public function setTen(string $ten): self
    {
        $this->ten = $ten;

        return $this;
    }

    public function getEleven(): ?string
    {
        return $this->eleven;
    }

    public function setEleven(string $eleven): self
    {
        $this->eleven = $eleven;

        return $this;
    }

    public function getTwelve(): ?string
    {
        return $this->twelve;
    }

    public function setTwelve(string $twelve): self
    {
        $this->twelve = $twelve;

        return $this;
    }

    public function getThirteen(): ?string
    {
        return $this->thirteen;
    }

    public function setThirteen(string $thirteen): self
    {
        $this->thirteen = $thirteen;

        return $this;
    }

    public function getFourteen(): ?string
    {
        return $this->fourteen;
    }

    public function setFourteen(string $fourteen): self
    {
        $this->fourteen = $fourteen;

        return $this;
    }

    public function getFifteen(): ?string
    {
        return $this->fifteen;
    }

    public function setFifteen(string $fifteen): self
    {
        $this->fifteen = $fifteen;

        return $this;
    }

    public function getSixteen(): ?string
    {
        return $this->sixteen;
    }

    public function setSixteen(string $sixteen): self
    {
        $this->sixteen = $sixteen;

        return $this;
    }

    public function getSeventeen(): ?string
    {
        return $this->seventeen;
    }

    public function setSeventeen(string $seventeen): self
    {
        $this->seventeen = $seventeen;

        return $this;
    }
}
