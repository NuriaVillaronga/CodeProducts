<?php

namespace App\Entity;

use App\Repository\SupplierRepository;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SupplierRepository::class)
 */
class Supplier
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Product::class, inversedBy="suppliers")
     */
    private $idProduct;

    /**
    * @ORM\Column(type="string", length=100, nullable=true)
    */
    private $supplierRole;

    /**
    * @ORM\Column(type="string", length=100, nullable=true) 
    */
    private $productAvailability;

    /**
    * @ORM\Column(type="string", length=100, nullable=true)
    */
    private $returnsCodeType;

    /**
    * @ORM\Column(type="string", length=100, nullable=true) 
    */
    private $returnsCode;

    /**
    * @ORM\Column(type="string", length=100, nullable=true) 
    */
    private $packQuantity;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $supplierName;

    /**
     * @ORM\OneToMany(targetEntity=Price::class, mappedBy="idSupplier", cascade={"all"})
     */
    private $prices;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $onSaleDate;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $expectedShipDate;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $onSaleDateFormat;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $expectedShipDateFormat; 


    public function __construct()
    {
        $this->prices = new ArrayCollection();
    }

    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdProduct(): ?Product
    {
        return $this->idProduct;
    }

    public function setIdProduct(?Product $idProduct): self
    {
        $this->idProduct = $idProduct;

        return $this;
    }

    public function getSupplierRole(): ?string
    {
        return $this->supplierRole;
    }

    public function setSupplierRole(?string $supplierRole): self
    {
        $this->supplierRole = $supplierRole;

        return $this;
    }

    public function getProductAvailability(): ?string
    {
        return $this->productAvailability;
    }

    public function setProductAvailability(?string $productAvailability): self
    {
        $this->productAvailability = $productAvailability;

        return $this;
    }

    public function getReturnsCode(): ?string
    {
        return $this->returnsCode;
    }

    public function setReturnsCode(?string $returnsCode): self
    {
        $this->returnsCode = $returnsCode;

        return $this;
    }

    public function getReturnsCodeType(): ?string
    {
        return $this->returnsCodeType;
    }

    public function setReturnsCodeType(?string $returnsCodeType): self
    {
        $this->returnsCodeType = $returnsCodeType;

        return $this;
    }

    public function getPackQuantity(): ?string 
    {
        return $this->packQuantity;
    }

    public function setPackQuantity(?string $packQuantity): self
    {
        $this->packQuantity = $packQuantity;

        return $this;
    }

    public function getSupplierName(): ?string
    {
        return $this->supplierName;
    }

    public function setSupplierName(?string $supplierName): self
    {
        $this->supplierName = $supplierName;

        return $this;
    }

    /**
     * @return Collection|Price[]
     */
    public function getPrices(): Collection
    {
        return $this->prices;
    }

    public function addPrice(Price $price): self
    {
        if (!$this->prices->contains($price)) {
            $this->prices[] = $price;
            $price->setIdSupplier($this);
        }

        return $this;
    }

    public function removePrice(Price $price): self
    {
        if ($this->prices->removeElement($price)) {
            // set the owning side to null (unless already changed)
            if ($price->getIdSupplier() === $this) {
                $price->setIdSupplier(null);
            }
        }

        return $this;
    }

    public function getOnSaleDate(): ?DateTime
    {
        return $this->onSaleDate;
    }

    public function setOnSaleDate(?DateTime $onSaleDate): self
    {
        $this->onSaleDate = $onSaleDate;

        return $this;
    }

    public function getExpectedShipDate(): ?DateTime
    {
        return $this->expectedShipDate;
    }

    public function setExpectedShipDate(?DateTime $expectedShipDate): self
    {
        $this->expectedShipDate = $expectedShipDate; 

        return $this; 
    }

    public function getOnSaleDateFormat(): ?string
    {
        return $this->onSaleDateFormat;
    }

    public function setOnSaleDateFormat(?string $onSaleDateFormat): self
    {
        $this->onSaleDateFormat = $onSaleDateFormat;

        return $this;
    }

    public function getExpectedShipDateFormat(): ?string
    {
        return $this->expectedShipDateFormat;
    }

    public function setExpectedShipDateFormat(?string $expectedShipDateFormat): self
    {
        $this->expectedShipDateFormat = $expectedShipDateFormat;

        return $this;
    }
}
