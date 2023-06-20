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
    private ?string $TasaInteres = null;

    #[ORM\Column]
    private ?int $Plazo = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $MontoMaxInversion = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $RequisitosIngresosMinimos = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $Garantias = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $CostosAdicionales = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $BeneficiosAdicionales = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?TiposProducto $TipoProducto = null;

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
        return $this->TasaInteres;
    }

    public function setTasaInteres(string $TasaInteres): static
    {
        $this->TasaInteres = $TasaInteres;

        return $this;
    }

    public function getPlazo(): ?int
    {
        return $this->Plazo;
    }

    public function setPlazo(int $Plazo): static
    {
        $this->Plazo = $Plazo;

        return $this;
    }

    public function getMontoMaxInversion(): ?string
    {
        return $this->MontoMaxInversion;
    }

    public function setMontoMaxInversion(string $MontoMaxInversion): static
    {
        $this->MontoMaxInversion = $MontoMaxInversion;

        return $this;
    }

    public function getRequisitosIngresosMinimos(): ?string
    {
        return $this->RequisitosIngresosMinimos;
    }

    public function setRequisitosIngresosMinimos(string $RequisitosIngresosMinimos): static
    {
        $this->RequisitosIngresosMinimos = $RequisitosIngresosMinimos;

        return $this;
    }

    public function getGarantias(): ?string
    {
        return $this->Garantias;
    }

    public function setGarantias(string $Garantias): static
    {
        $this->Garantias = $Garantias;

        return $this;
    }

    public function getCostosAdicionales(): ?string
    {
        return $this->CostosAdicionales;
    }

    public function setCostosAdicionales(string $CostosAdicionales): static
    {
        $this->CostosAdicionales = $CostosAdicionales;

        return $this;
    }

    public function getBeneficiosAdicionales(): ?string
    {
        return $this->BeneficiosAdicionales;
    }

    public function setBeneficiosAdicionales(string $BeneficiosAdicionales): static
    {
        $this->BeneficiosAdicionales = $BeneficiosAdicionales;

        return $this;
    }

    public function getTipoProducto(): ?TiposProducto
    {
        return $this->TipoProducto;
    }

    public function setTipoProducto(?TiposProducto $TipoProducto): static
    {
        $this->TipoProducto = $TipoProducto;

        return $this;
    }
}
