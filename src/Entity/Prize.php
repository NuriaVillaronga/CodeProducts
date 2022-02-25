<?php

namespace App\Entity;

use App\Repository\PrizeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PrizeRepository::class)
 */
class Prize
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $prizeName;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $prizeCountry;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $prizeCode;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $prizeJury;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $prizeYear;

    /**
     * @ORM\ManyToOne(targetEntity=Product::class, inversedBy="prizes")
     */
    private $idProduct;

    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }
    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrizeName(): ?string
    {
        return $this->prizeName;
    }

    public function setPrizeName(?string $prizeName): self
    {
        $this->prizeName = $prizeName;

        return $this;
    }

    public function getPrizeCountry(): ?string
    {
        return $this->prizeCountry;
    }

    public function setPrizeCountry(?string $prizeCountry): self
    {
        $this->prizeCountry = $prizeCountry;

        return $this;
    }

    public function getPrizeCode(): ?string
    {
        return $this->prizeCode;
    }

    public function setPrizeCode(?string $prizeCode): self
    {
        $this->prizeCode = $prizeCode;

        return $this;
    }

    public function getPrizeJury(): ?string
    {
        return $this->prizeJury;
    }

    public function setPrizeJury(?string $prizeJury): self
    {
        $this->prizeJury = $prizeJury;

        return $this;
    }

    public function getPrizeYear(): ?string
    {
        return $this->prizeYear;
    }

    public function setPrizeYear(?string $prizeYear): self
    {
        $this->prizeYear = $prizeYear;

        return $this;
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
}
