<?php

namespace App\Entity;

use App\Repository\ProductoFinancieroRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductoFinancieroRepository::class)]
class ProductoFinanciero
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nombre = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $tasaInteres = null;

    #[ORM\Column]
    private ?int $plazo = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $montoMaxInversion = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $requisitosIngresosMinimos = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $garantias = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $costosAdicionales = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $beneficiosAdicionales = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?TiposProducto $tipoProducto = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): static
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getTasaInteres(): ?string
    {
        return $this->tasaInteres;
    }

    public function setTasaInteres(string $tasaInteres): static
    {
        $this->tasaInteres = $tasaInteres;

        return $this;
    }

    public function getPlazo(): ?int
    {
        return $this->plazo;
    }

    public function setPlazo(int $plazo): static
    {
        $this->plazo = $plazo;

        return $this;
    }

    public function getMontoMaxInversion(): ?string
    {
        return $this->montoMaxInversion;
    }

    public function setMontoMaxInversion(string $montoMaxInversion): static
    {
        $this->montoMaxInversion = $montoMaxInversion;

        return $this;
    }

    public function getRequisitosIngresosMinimos(): ?string
    {
        return $this->requisitosIngresosMinimos;
    }

    public function setRequisitosIngresosMinimos(string $requisitosIngresosMinimos): static
    {
        $this->requisitosIngresosMinimos = $requisitosIngresosMinimos;

        return $this;
    }

    public function getGarantias(): ?string
    {
        return $this->garantias;
    }

    public function setGarantias(string $garantias): static
    {
        $this->garantias = $garantias;

        return $this;
    }

    public function getCostosAdicionales(): ?string
    {
        return $this->costosAdicionales;
    }

    public function setCostosAdicionales(string $costosAdicionales): static
    {
        $this->costosAdicionales = $costosAdicionales;

        return $this;
    }

    public function getBeneficiosAdicionales(): ?string
    {
        return $this->beneficiosAdicionales;
    }

    public function setBeneficiosAdicionales(string $beneficiosAdicionales): static
    {
        $this->beneficiosAdicionales = $beneficiosAdicionales;

        return $this;
    }

    public function getTipoProducto(): ?TiposProducto
    {
        return $this->tipoProducto;
    }

    public function setTipoProducto(?TiposProducto $tipoProducto): static
    {
        $this->tipoProducto = $tipoProducto;

        return $this;
    }
}
