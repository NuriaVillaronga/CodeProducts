<?php

namespace App\Entity;

use App\Repository\PriceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PriceRepository::class)
 */
class Price
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Supplier::class, inversedBy="prices")
     */
    private $idSupplier;

    /**
    * @ORM\Column(type="string", length=255, nullable=true)
    */
    private $priceType;

    /**
    * @ORM\Column(type="string", length=100, nullable=true)
    */
    private $taxRateCode;

    /**
    * @ORM\Column(type="string", length=100, nullable=true)
    */
    private $taxableAmount;

    /**
    * @ORM\Column(type="string", length=100, nullable=true)
    */
    private $taxAmount;

    /**
    * @ORM\Column(type="text", nullable=true) 
    */
    private $currencyCode;

    /**
    * @ORM\Column(type="text", nullable=true)
    */
    private $countriesIncluded;

    /**
    * @ORM\Column(type="string", length=100, nullable=true)
    */
    private $discountCodeType;

    /**
    * @ORM\Column(type="string", length=100, nullable=true)
    */
    private $discountCode;

    /**
    * @ORM\Column(type="string", length=100, nullable=true) 
    */
    private $taxRatePercent;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $priceAmount;

    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }
    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdSupplier(): ?Supplier
    {
        return $this->idSupplier;
    }

    public function setIdSupplier(?Supplier $idSupplier): self
    {
        $this->idSupplier = $idSupplier;

        return $this;
    }

    public function getPriceType(): ?string
    {
        return $this->priceType;
    }

    public function setPriceType(?string $priceType): self
    {
        $this->priceType = $priceType;

        return $this;
    }

    public function getTaxRateCode(): ?string
    {
        return $this->taxRateCode;
    }

    public function setTaxRateCode(?string $taxRateCode): self
    {
        $this->taxRateCode = $taxRateCode;

        return $this;
    }

    public function getTaxableAmount(): ?string
    {
        return $this->taxableAmount;
    }

    public function setTaxableAmount(?string $taxableAmount): self
    {
        $this->taxableAmount = $taxableAmount;

        return $this;
    }

    public function getTaxAmount(): ?string
    {
        return $this->taxAmount;
    }

    public function setTaxAmount(?string $taxAmount): self
    {
        $this->taxAmount = $taxAmount;

        return $this;
    }

    public function getTaxRatePercent(): ?string
    {
        return $this->taxRatePercent;
    }

    public function setTaxRatePercent(?string $taxRatePercent): self
    {
        $this->taxRatePercent = $taxRatePercent;

        return $this;
    }

    public function getCurrencyCode(): ?string
    {
        return $this->currencyCode;
    }

    public function setCurrencyCode(?string $currencyCode): self
    {
        $this->currencyCode = $currencyCode;

        return $this;
    }

    public function getCountriesIncluded(): ?string
    {
        return $this->countriesIncluded;
    }

    public function setCountriesIncluded(?string $countriesIncluded): self
    {
        $this->countriesIncluded = $countriesIncluded;

        return $this;
    }

    public function getDiscountCodeType(): ?string
    {
        return $this->discountCodeType;
    }

    public function setDiscountCodeType(?string $discountCodeType): self
    {
        $this->discountCodeType = $discountCodeType;

        return $this;
    }

    public function getDiscountCode(): ?string
    {
        return $this->discountCode;
    }

    public function setDiscountCode(?string $discountCode): self
    {
        $this->discountCode = $discountCode;

        return $this;
    }

    public function getPriceAmount(): ?string
    {
        return $this->priceAmount;
    }

    public function setPriceAmount(?string $priceAmount): self
    {
        $this->priceAmount = $priceAmount;

        return $this;
    }
}
