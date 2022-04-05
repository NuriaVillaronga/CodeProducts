<?php

namespace App\Entity;

use App\Repository\RelatedProductRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RelatedProductRepository::class)
 */
class RelatedProduct
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Product::class, inversedBy="relatedProducts")
     */
    private $idProduct;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $productRelationCode = [];

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $productFormDetailRP = [];

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $productFormRP;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $relatedProductISBN;

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

    public function getProductRelationCode(): ?array
    {
        return $this->productRelationCode;
    }

    public function setProductRelationCode(?array $productRelationCode): self
    {
        $this->productRelationCode = $productRelationCode;

        return $this;
    }

    public function getProductFormDetailRP(): ?array
    {
        return $this->productFormDetailRP;
    }

    public function setProductFormDetailRP(?array $productFormDetailRP): self
    {
        $this->productFormDetailRP = $productFormDetailRP;

        return $this;
    }

    public function getProductFormRP(): ?string
    {
        return $this->productFormRP;
    }

    public function setProductFormRP(?string $productFormRP): self
    {
        $this->productFormRP = $productFormRP;

        return $this;
    }

    public function getRelatedProductISBN(): ?string
    {
        return $this->relatedProductISBN;
    }

    public function setRelatedProductISBN(?string $relatedProductISBN): self
    {
        $this->relatedProductISBN = $relatedProductISBN;

        return $this;
    }
}
