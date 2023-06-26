<?php

namespace App\DTO;

class UserDTO
{
    /**
     * Summary of username
     * @var string
     */
    private string $username;

    /**
     * Summary of email
     * @var string
     */
    private string $email;

    /**
     * Summary of nombre
     * @var string
     */
    private string $nombre;

    /**
     * Summary of apellido
     * @var string
     */
    private string $apellido;

    /**
     * Summary of edad
     * @var string
     */
    private string $edad;

    /**
     * Summary of ciudad
     * @var string
     */
    private string $ciudad;
    
	  /**
	   * Summary of ciudadId
	   * @var int
	   */
    private int $ciudadId;

	/**
	 * @return mixed
	 */
	public function getUsername() {
		return $this->username;
	}
	
	/**
	 * @param mixed $username 
	 * @return self
	 */
	public function setUsername($username): self {
		$this->username = $username;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getEmail() {
		return $this->email;
	}
	
	/**
	 * @param mixed $email 
	 * @return self
	 */
	public function setEmail($email): self {
		$this->email = $email;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getNombre() {
		return $this->nombre;
	}
	
	/**
	 * @param mixed $nombre 
	 * @return self
	 */
	public function setNombre($nombre): self {
		$this->nombre = $nombre;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getApellido() {
		return $this->apellido;
	}
	
	/**
	 * @param mixed $apellido	
	 * @return self
	 */
	public function setApellido($apellido): self {
		$this->apellido = $apellido;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getEdad() {
		return $this->edad;
	}
	
	/**
	 * @param mixed $edad 
	 * @return self
	 */
	public function setEdad($edad): self {
		$this->edad = $edad;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getCiudad() {
		return $this->ciudad;
	}
	
	/**
	 * @param mixed $ciudad 
	 * @return self
	 */
	public function setCiudad($ciudad): self {
		$this->ciudad = $ciudad;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getCiudadId(): int {
		return $this->ciudadId;
	}
	
	/**
	 * @param int $ciudadId 
	 * @return self
	 */
	public function setCiudadId(int $ciudadId): self {
		$this->ciudadId = $ciudadId;
		return $this;
	}
}