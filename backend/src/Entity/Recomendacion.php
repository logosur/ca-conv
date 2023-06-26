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
    private ?User $usuario = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'], fetch:"EAGER")]
    #[ORM\JoinColumn(nullable: false)]
    private ?ProductoFinanciero $producto = null;


    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $fecha = null;

    #[ORM\OneToOne(inversedBy: 'recomendacion', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?ChatSession $chat = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsuario(): ?User
    {
        return $this->usuario;
    }

    public function setUsuario(User $usuario): static
    {
        $this->usuario = $usuario;

        return $this;
    }

    public function getProducto(): ?ProductoFinanciero
    {
        return $this->producto;
    }

    public function setProducto(ProductoFinanciero $producto): static
    {
        $this->producto = $producto;

        return $this;
    }

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecha;
    }

    public function setFecha(\DateTimeInterface $fecha): static
    {
        $this->fecha = $fecha;

        return $this;
    }

    public function getChat(): ?ChatSession
    {
        return $this->chat;
    }

    public function setChat(ChatSession $chat): static
    {
        $this->chat = $chat;

        return $this;
    }

}
