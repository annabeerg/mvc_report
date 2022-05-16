<?php

namespace App\Entity;

use App\Repository\TemperatureRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TemperatureRepository::class)]
class Temperature
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $middle_temp;

    #[ORM\Column(type: 'string', length: 255)]
    private $year;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMiddleTemp(): ?string
    {
        return $this->middle_temp;
    }

    public function setMiddleTemp(string $middle_temp): self
    {
        $this->middle_temp = $middle_temp;

        return $this;
    }

    public function getYear(): ?string
    {
        return $this->year;
    }

    public function setYear(string $year): self
    {
        $this->year = $year;

        return $this;
    }
}
