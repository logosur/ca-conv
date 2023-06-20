<?php

namespace App\Entity;

use App\Repository\CiudadRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CiudadRepository::class)]
class Ciudad
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $ciudad = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCiudad(): ?string
    {
        return $this->ciudad;
    }

    public function setCiudad(string $ciudad): static
    {
        $this->ciudad = $ciudad;

        return $this;
    }
}
