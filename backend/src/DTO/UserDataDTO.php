<?php

namespace App\DTO;

use App\Entity\ProductoFinanciero;
use Doctrine\Common\Collections\ArrayCollection;
use App\Entity\ChatPreguntas;
use Doctrine\ORM\PersistentCollection;
use App\DTO\PreguntaDTO;

class UserDataDTO
{
    /**
     * Summary of id
     * @var int
     */
    private int $id;

    /**
     * Summary of completado
     * @var int
     */
    private int $completado;

    /**
     * Summary of preguntas
     * @var array<PreguntaDTO>
     */
    private Array $preguntas;

    /**
     * Summary of producto
     * @var ProductoFinanciero
     */
    private ProductoFinanciero $producto;

    /**
     * Summary of fecha
     * @var \DateTimeInterface
     */
    private \DateTimeInterface $fecha;

    public function __construct()
    {
        $this->preguntas = [];
    }

	/**
	 * @return int
	 */
	public function getId(): int {
		return $this->id;
	}
	
	/**
	 * @param int $id 
	 * @return self
	 */
	public function setId(int $id): self {
		$this->id = $id;
		return $this;
	}
	
	/**
	 * @return int
	 */
	public function getCompletado(): int {
		return $this->completado;
	}
	
	/**
	 * @param int $completado 
	 * @return self
	 */
	public function setCompletado(int $completado): self {
		$this->completado = $completado;
		return $this;
	}
	
	/**
	 * Summary of preguntas
	 * @return array<PreguntaDTO>
	 */
	public function getPreguntas(): Array
    {
		return $this->preguntas;
	}
	
	/**
	 * Summary of preguntas
	 * @param array<PreguntaDTO> $preguntas Summary of preguntas
	 * @return self
	 */
	public function setPreguntas(Array $preguntas): self
    {
		$this->preguntas = $preguntas;

		return $this;
	}
	
	/**
	 * @return ProductoFinanciero
	 */
	public function getProducto(): ProductoFinanciero
    {
		return $this->producto;
	}
	
	/**
	 * @param ProductoFinanciero $producto 
	 * @return self
	 */
	public function setProducto(ProductoFinanciero $producto): self
    {
		$this->producto = $producto;
		return $this;
	}

	/**
	 * Summary of fecha
	 * @return \DateTimeInterface
	 */
	public function getFecha(): \DateTimeInterface
    {
		return $this->fecha;
	}
	
	/**
	 * Summary of fecha
	 * @param \DateTimeInterface $fecha Summary of fecha
	 * @return self
	 */
	public function setFecha(\DateTimeInterface $fecha): self
    {
		$this->fecha = $fecha;
		return $this;
	}
}