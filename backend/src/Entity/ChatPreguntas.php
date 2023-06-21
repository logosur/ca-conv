<?php

namespace App\Entity;

use App\Repository\ChatPreguntasRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ChatPreguntasRepository::class)]
class ChatPreguntas
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'chatPreguntas')]
    #[ORM\JoinColumn(nullable: false)]
    private ?ChatSession $chat = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Pregunta $pregunta = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?UsuariosRespuesta $respuesta = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $fecha = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getChat(): ?ChatSession
    {
        return $this->chat;
    }

    public function setChat(?ChatSession $chat): static
    {
        $this->chat = $chat;

        return $this;
    }

    public function getPregunta(): ?Pregunta
    {
        return $this->pregunta;
    }

    public function setPregunta(Pregunta $pregunta): static
    {
        $this->pregunta = $pregunta;

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

    public function getRespuesta(): ?UsuariosRespuesta
    {
        return $this->respuesta;
    }

    public function setRespuesta(?UsuariosRespuesta $respuesta): static
    {
        $this->respuesta = $respuesta;

        return $this;
    }
}
