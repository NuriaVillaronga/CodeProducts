<?php

namespace App\Entity;

use App\Repository\ContributorRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ContributorRepository::class)
 */
class Contributor
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Product::class, inversedBy="contributors")
     */
    private $idProduct;

    /**
    * @ORM\Column(type="string", length=100, nullable=true)
    */
    private $personName;

    /**
    * @ORM\Column(type="string", length=100, nullable=true)
    */
    private $keyNames;

    /**
    * @ORM\Column(type="string", length=100, nullable=true)
    */
    private $namesBeforeKey;

    /**
    * @ORM\Column(type="string", length=100, nullable=true)
    */
    private $personNameInverted;

    /**
    * @ORM\Column(type="string", length=100, nullable=true)
    */
    private $corporateName;

    /**
    * @ORM\Column(type="string", length=100, nullable=true)
    */
    private $countryCode;

    /**
    * @ORM\Column(type="array", nullable=true)
    */
    private $contributorRole = []; 

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

    public function getKeyNames(): ?string
    {
        return $this->keyNames;
    }

    public function setKeyNames(?string $keyNames): self
    {
        $this->keyNames = $keyNames;

        return $this;
    }

    public function getNamesBeforeKey(): ?string
    {
        return $this->namesBeforeKey;
    }

    public function setNamesBeforeKey(?string $namesBeforeKey): self
    {
        $this->namesBeforeKey = $namesBeforeKey;

        return $this;
    }

    public function getPersonNameInverted(): ?string
    {
        return $this->personNameInverted;
    }

    public function setPersonNameInverted(?string $personNameInverted): self
    {
        $this->personNameInverted = $personNameInverted;

        return $this;
    }

    public function getCorporateName(): ?string
    {
        return $this->corporateName;
    }

    public function setCorporateName(?string $corporateName): self
    {
        $this->corporateName = $corporateName;

        return $this;
    }

    public function getCountryCode(): ?string
    {
        return $this->countryCode;
    }

    public function setCountryCode(?string $countryCode): self
    {
        $this->countryCode = $countryCode;

        return $this;
    }

    public function getContributorRole(): ?array
    {
        return $this->contributorRole;
    }

    public function setContributorRole(?array $contributorRole): self
    {
        $this->contributorRole = $contributorRole;

        return $this;
    }

    public function getPersonName(): ?string
    {
        return $this->personName;
    }

    public function setPersonName(?string $personName): self
    {
        $this->personName = $personName;

        return $this;
    }
}
