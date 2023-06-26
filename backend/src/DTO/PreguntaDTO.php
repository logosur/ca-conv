<?php

namespace App\DTO;

class PreguntaDTO
{
    /**
     * Summary of id
     * @var int
     */
    private int $id;

    /**
     * Summary of titulo
     * @var string
     */
    private string $titulo;

    /**
     * Summary of descripcion
     * @var string
     */
    private string $descripcion;

    /**
     * Summary of respuesta
     * @var string
     */
    private string $respuesta;




	/**
	 * Summary of id
	 * @return int
	 */
	public function getId(): int {
		return $this->id;
	}
	
	/**
	 * Summary of id
	 * @param int $id Summary of id
	 * @return self
	 */
	public function setId(int $id): self {
		$this->id = $id;
		return $this;
	}
	
	/**
	 * Summary of titulo
	 * @return string
	 */
	public function getTitulo(): string {
		return $this->titulo;
	}
	
	/**
	 * Summary of titulo
	 * @param string $titulo Summary of titulo
	 * @return self
	 */
	public function setTitulo(string $titulo): self {
		$this->titulo = $titulo;
		return $this;
	}
	
	/**
	 * Summary of descripcion
	 * @return string
	 */
	public function getDescripcion(): string {
		return $this->descripcion;
	}
	
	/**
	 * Summary of descripcion
	 * @param string $descripcion Summary of descripcion
	 * @return self
	 */
	public function setDescripcion(string $descripcion): self {
		$this->descripcion = $descripcion;
		return $this;
	}
	
	/**
	 * Summary of respuesta
	 * @return string
	 */
	public function getRespuesta(): string {
		return $this->respuesta;
	}
	
	/**
	 * Summary of respuesta
	 * @param string $respuesta Summary of respuesta
	 * @return self
	 */
	public function setRespuesta(string $respuesta): self {
		$this->respuesta = $respuesta;
		return $this;
	}
}