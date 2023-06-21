<?php

namespace App\Entity;

use App\Repository\ChatSessionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ChatSessionRepository::class)]
class ChatSession
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?User $usuario = null;

    #[ORM\Column(type: Types::SMALLINT, nullable: true)]
    private ?int $completado = null;

    #[ORM\OneToMany(mappedBy: 'chat', targetEntity: ChatPreguntas::class)]
    private Collection $chatPreguntas;
    
    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $fechaInicio = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $fechaModificacion = null;

    #[ORM\OneToOne(mappedBy: 'chat', cascade: ['persist', 'remove'])]
    private ?Recomendacion $recomendacion = null;



    public function __construct()
    {
        $this->chatPreguntas = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getUsuario(): ?User
    {
        return $this->usuario;
    }

    public function setUsuario(?User $usuario): static
    {
        $this->usuario = $usuario;

        return $this;
    }

    public function getCompletado(): ?int
    {
        return $this->completado;
    }

    public function setCompletado(?int $completado): static
    {
        $this->completado = $completado;

        return $this;
    }

    public function getFechaInicio(): ?\DateTimeInterface
    {
        return $this->fechaInicio;
    }

    public function setFechaInicio(\DateTimeInterface $fechaInicio): static
    {
        $this->fechaInicio = $fechaInicio;

        return $this;
    }

    public function getFechaModificacion(): ?\DateTimeInterface
    {
        return $this->fechaModificacion;
    }

    public function setFechaModificacion(?\DateTimeInterface $fechaModificacion): static
    {
        $this->fechaModificacion = $fechaModificacion;

        return $this;
    }

    /**
     * @return Collection<int, ChatPreguntas>
     */
    public function getChatPreguntas(): Collection
    {
        return $this->chatPreguntas;
    }

    public function addChatPregunta(ChatPreguntas $chatPregunta): static
    {
        if (!$this->chatPreguntas->contains($chatPregunta)) {
            $this->chatPreguntas->add($chatPregunta);
            $chatPregunta->setChat($this);
        }

        return $this;
    }

    public function removeChatPregunta(ChatPreguntas $chatPregunta): static
    {
        if ($this->chatPreguntas->removeElement($chatPregunta)) {
            // set the owning side to null (unless already changed)
            if ($chatPregunta->getChat() === $this) {
                $chatPregunta->setChat(null);
            }
        }

        return $this;
    }

    public function getRecomendacion(): ?Recomendacion
    {
        return $this->recomendacion;
    }

    public function setRecomendacion(Recomendacion $recomendacion): static
    {
        // set the owning side of the relation if necessary
        if ($recomendacion->getChat() !== $this) {
            $recomendacion->setChat($this);
        }

        $this->recomendacion = $recomendacion;

        return $this;
    }
}
