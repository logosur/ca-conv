<?php

namespace App\Entity;

use App\Repository\RecomendacionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\User;
use App\Entity\ProductoFinanciero;

#[ORM\Entity(repositoryClass: RecomendacionRepository::class)]
class Recomendacion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $Usuario = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?ProductoFinanciero $Producto = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $Fecha = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsuario(): ?User
    {
        return $this->Usuario;
    }

    public function setUsuario(User $Usuario): static
    {
        $this->Usuario = $Usuario;

        return $this;
    }

    public function getProducto(): ?ProductoFinanciero
    {
        return $this->Producto;
    }

    public function setProducto(ProductoFinanciero $Producto): static
    {
        $this->Producto = $Producto;

        return $this;
    }

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->Fecha;
    }

    public function setFecha(\DateTimeInterface $Fecha): static
    {
        $this->Fecha = $Fecha;

        return $this;
    }
}
