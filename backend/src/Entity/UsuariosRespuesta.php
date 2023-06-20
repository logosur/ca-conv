<?php

namespace App\Entity;

use App\Repository\UsuariosRespuestaRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Pregunta;
use App\Entity\User;

#[ORM\Entity(repositoryClass: UsuariosRespuestaRepository::class)]
class UsuariosRespuesta
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $Usuario = null;

    #[ORM\Column(length: 512)]
    private ?string $Respuesta = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $fecha = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Pregunta $Pregunta = null;

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

    public function getRespuesta(): ?string
    {
        return $this->Respuesta;
    }

    public function setRespuesta(string $Respuesta): static
    {
        $this->Respuesta = $Respuesta;

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

    public function getPregunta(): ?Pregunta
    {
        return $this->Pregunta;
    }

    public function setPregunta(Pregunta $Pregunta): static
    {
        $this->Pregunta = $Pregunta;

        return $this;
    }
}
