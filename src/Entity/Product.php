<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 * @UniqueEntity("recordReference")
 */
class Product
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $recordReference;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $titleText;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $productForm;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $subjectHeadingText;

    /**
     * @ORM\ManyToOne(targetEntity=File::class, inversedBy="products")
     * @ORM\JoinColumn(nullable=true)
     */
    private $file;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $titlePrefix;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $titleWithoutPrefix;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $notificationType;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $productFormDetail = [];

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $productComposition;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $collectionType;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $titleTextCollection;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $publisherName;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $publishingDate;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $publishingStatus;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $cityOfPublication;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $countryOfPublication = [];

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $countryOfManufacture = [];

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $languageCode = [];

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $copyrightYear; 

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $numberOfPages;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $editionNumber;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $subtitle;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $collectionSequenceNumber;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $epubTechnicalProtection;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $productPackaging;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $primaryContentType;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $barcodeType;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $yearPublishingDate;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $partNumber;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $ISBN13;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $ISBN10;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $EAN;

    /**
     * @ORM\ManyToOne(targetEntity=Catalog::class, inversedBy="products")
     * @ORM\JoinColumn(nullable=false)
     */
    private $catalog;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="products")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $bisacSubject;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $themaSubject;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $themesElectre;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $subjectSchemaVersion;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $subjectCode;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $audienceRangeQualifier;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $audienceFrom;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $audienceTo;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $audienceCode = [];

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $heightMeasurement;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $widthMeasurement; 

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $thicknessMeasurement;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $weightMeasurement;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $heightMeasureUnit;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $widthMeasureUnit;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $thicknessMeasureUnit;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $weightMeasureUnit;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $durationExtentValue;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $fileSizeExtentValue;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $durationExtentUnit;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $fileSizeExtentUnit;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $nameCode;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $nameCodeValue;

    /**
     * @ORM\OneToMany(targetEntity=Supplier::class, mappedBy="idProduct", cascade={"all"})  
     */
    private $suppliers;

    /**
     * @ORM\OneToMany(targetEntity=Contributor::class, mappedBy="idProduct", cascade={"all"}) 
     */
    private $contributors;

    /**
     * @ORM\OneToMany(targetEntity=RelatedProduct::class, mappedBy="idProduct", cascade={"all"}) 
     */
    private $relatedProducts;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $mainDescription;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $tableContent;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $backCoverCopy;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $biographicalNoteCD;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $excerptBook;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $reviewQuote;

    /**
     * @ORM\OneToMany(targetEntity=Prize::class, mappedBy="idProduct", cascade={"all"}) 
     */
    private $prizes;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $promotionCampaign;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $typeILL; 

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $numberILL;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $descriptionILL;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $workRelationCode;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $workIDType;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $workIDValue;

    /**
     * @ORM\OneToMany(targetEntity=Images::class, mappedBy="idProduct", cascade={"all"})
     */
    private $images;


    public function __construct()
    {
        $this->suppliers = new ArrayCollection();
        $this->contributors = new ArrayCollection();
        $this->relatedWorks = new ArrayCollection();
        $this->relatedProducts = new ArrayCollection();
        $this->prizes = new ArrayCollection();
        $this->images = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRecordReference(): ?string
    {
        return $this->recordReference;
    }

    public function setRecordReference(?string $recordReference): self
    {
        $this->recordReference = $recordReference;

        return $this;
    }

    public function getTitleText(): ?string
    {
        return $this->titleText;
    }

    public function setTitleText(?string $titleText): self
    {
        $this->titleText = $titleText;

        return $this;
    }

    public function getProductIDType(): ?string
    {
        return $this->productIDType;
    }

    public function setProductIDType(?string $productIDType): self
    {
        $this->productIDType = $productIDType;

        return $this;
    }

    public function getProductForm(): ?string
    {
        return trim($this->productForm);
    }

    public function setProductForm(?string $productForm): self
    {
        $this->productForm = $productForm;

        return $this;
    }

    public function getSubjectHeadingText(): ?string
    {
        return $this->subjectHeadingText;
    }

    public function setSubjectHeadingText(?string $subjectHeadingText): self
    {
        $this->subjectHeadingText = $subjectHeadingText;

        return $this;
    }

    public function getFile(): ?File
    {
        return $this->file;
    }

    public function setFile(?File $file): self
    {
        $this->file = $file;

        return $this;
    }

    public function getTitlePrefix(): ?string
    {
        return $this->titlePrefix;
    }

    public function setTitlePrefix(?string $titlePrefix): self
    {
        $this->titlePrefix = $titlePrefix;

        return $this;
    }

    public function getTitleWithoutPrefix(): ?string
    {
        return $this->titleWithoutPrefix;
    }

    public function setTitleWithoutPrefix(?string $titleWithoutPrefix): self
    {
        $this->titleWithoutPrefix = $titleWithoutPrefix;

        return $this;
    }

    public function getNotificationType(): ?string
    {
        return trim($this->notificationType);
    }

    public function setNotificationType(?string $notificationType): self
    {
        $this->notificationType = $notificationType;

        return $this;
    }

    public function getProductFormDetail(): array
    {
        return $this->productFormDetail;
    }

    public function setProductFormDetail(array $productFormDetail): self
    {
        $this->productFormDetail = $productFormDetail;

        return $this;
    }

    public function getProductComposition(): ?string
    {
        return trim($this->productComposition);
    }

    public function setProductComposition(?string $productComposition): self
    {
        $this->productComposition = $productComposition;

        return $this;
    }

    public function getCollectionType(): string
    {
        return $this->collectionType;
    }

    public function setCollectionType(string $collectionType): self
    {
        $this->collectionType = $collectionType;

        return $this;
    }

    public function getTitleTextCollection(): ?string
    {
        return $this->titleTextCollection;
    }

    public function setTitleTextCollection(?string $titleTextCollection): self
    {
        $this->titleTextCollection = $titleTextCollection;

        return $this;
    }

    public function getPublisherName(): ?string
    {
        return $this->publisherName;
    }

    public function setPublisherName(?string $publisherName): self
    {
        $this->publisherName = $publisherName;

        return $this;
    }

    public function getPublishingDate(): ?DateTime
    {
        return $this->publishingDate;
    }

    public function setPublishingDate(?DateTime $publishingDate): self
    {
        $this->publishingDate = $publishingDate;

        return $this;
    }

    public function getPublishingStatus(): ?string
    {
        return trim($this->publishingStatus);
    }

    public function setPublishingStatus(?string $publishingStatus): self
    {
        $this->publishingStatus = $publishingStatus;

        return $this;
    }

    public function getCityOfPublication(): ?string
    {
        return $this->cityOfPublication;
    }

    public function setCityOfPublication(?string $cityOfPublication): self
    {
        $this->cityOfPublication = $cityOfPublication;

        return $this;
    }

    public function getCountryOfPublication(): array
    {
        return $this->countryOfPublication;
    }

    public function setCountryOfPublication(array $countryOfPublication): self
    {
        $this->countryOfPublication = $countryOfPublication;

        return $this;
    }

    public function getCountryOfManufacture(): array
    {
        return $this->countryOfManufacture;
    }

    public function setCountryOfManufacture(array $countryOfManufacture): self
    {
        $this->countryOfManufacture = $countryOfManufacture;

        return $this;
    }

    public function getLanguageCode(): array
    {
        return $this->languageCode;
    }

    public function setLanguageCode(array $languageCode): self
    {
        $this->languageCode = $languageCode;

        return $this;
    }

    public function getCopyrightYear(): ?string
    {
        return $this->copyrightYear;
    }

    public function setCopyrightYear(?string $copyrightYear): self
    {
        $this->copyrightYear = $copyrightYear;

        return $this;
    }

    public function getNumberOfPages(): ?string
    {
        return $this->numberOfPages;
    }

    public function setNumberOfPages(?string $numberOfPages): self
    {
        $this->numberOfPages = $numberOfPages;

        return $this;
    }

    public function getEditionNumber(): ?string
    {
        return $this->editionNumber;
    }

    public function setEditionNumber(?string $editionNumber): self
    {
        $this->editionNumber = $editionNumber;

        return $this;
    }

    public function getSubtitle(): ?string
    {
        return $this->subtitle;
    }

    public function setSubtitle(?string $subtitle): self
    {
        $this->subtitle = $subtitle;

        return $this;
    }

    public function getCollectionSequenceNumber(): ?string
    {
        return $this->collectionSequenceNumber;
    }

    public function setCollectionSequenceNumber(?string $collectionSequenceNumber): self
    {
        $this->collectionSequenceNumber = $collectionSequenceNumber;

        return $this;
    }

    public function getEpubTechnicalProtection(): ?string
    {
        return trim($this->epubTechnicalProtection);
    }

    public function setEpubTechnicalProtection(?string $epubTechnicalProtection): self
    {
        $this->epubTechnicalProtection = $epubTechnicalProtection;

        return $this;
    }

    public function getProductPackaging(): ?string
    {
        return trim($this->productPackaging);
    }

    public function setProductPackaging(?string $productPackaging): self
    {
        $this->productPackaging = $productPackaging;

        return $this;
    }

    public function getPrimaryContentType(): ?string
    {
        return trim($this->primaryContentType);
    }

    public function setPrimaryContentType(?string $primaryContentType): self
    {
        $this->primaryContentType = $primaryContentType;

        return $this;
    }

    public function getBarcodeType(): ?string
    {
        return trim($this->barcodeType);
    }

    public function setBarcodeType(?string $barcodeType): self
    {
        $this->barcodeType = $barcodeType;

        return $this;
    }

    public function getYearPublishingDate(): ?string
    {
        return $this->yearPublishingDate;
    }

    public function setYearPublishingDate(?string $yearPublishingDate): self
    {
        $this->yearPublishingDate = $yearPublishingDate;

        return $this;
    }

    public function getPartNumber(): ?string
    {
        return $this->partNumber;
    }

    public function setPartNumber(?string $partNumber): self
    {
        $this->partNumber = $partNumber;

        return $this;
    }

    public function getISBN13(): ?string
    {
        return $this->ISBN13;
    }

    public function setISBN13(?string $ISBN13): self
    {
        $this->ISBN13 = $ISBN13;

        return $this;
    }

    public function getISBN10(): ?string
    {
        return $this->ISBN10;
    }

    public function setISBN10(?string $ISBN10): self
    {
        $this->ISBN10 = $ISBN10;

        return $this;
    }

    public function getEAN(): ?string
    {
        return $this->EAN;
    }

    public function setEAN(?string $EAN): self
    {
        $this->EAN = $EAN;

        return $this;
    }

    public function getCatalog(): ?Catalog
    {
        return $this->catalog;
    }

    public function setCatalog(?Catalog $catalog): self
    {
        $this->catalog = $catalog;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getBisacSubject(): ?string
    {
        return $this->bisacSubject;
    }

    public function setBisacSubject(?string $bisacSubject): self
    {
        $this->bisacSubject = $bisacSubject;

        return $this;
    }

    public function getThemaSubject(): ?string
    {
        return $this->themaSubject;
    }

    public function setThemaSubject(?string $themaSubject): self
    {
        $this->themaSubject = $themaSubject;

        return $this;
    }

    public function getThemesElectre(): ?string
    {
        return $this->themesElectre;
    }

    public function setThemesElectre(?string $themesElectre): self
    {
        $this->themesElectre = $themesElectre;

        return $this;
    }

    public function getSubjectSchemaVersion(): ?string
    {
        return $this->subjectSchemaVersion;
    }

    public function setSubjectSchemaVersion(?string $subjectSchemaVersion): self
    {
        $this->subjectSchemaVersion = $subjectSchemaVersion;

        return $this;
    }

    public function getSubjectCode(): ?string
    {
        return $this->subjectCode;
    }

    public function setSubjectCode(?string $subjectCode): self
    {
        $this->subjectCode = $subjectCode;

        return $this;
    }

    public function getAudienceRangeQualifier(): ?string
    {
        return $this->audienceRangeQualifier;
    }

    public function setAudienceRangeQualifier(?string $audienceRangeQualifier): self
    {
        $this->audienceRangeQualifier = $audienceRangeQualifier;

        return $this;
    }

    public function getAudienceFrom(): ?string
    {
        return $this->audienceFrom;
    }

    public function setAudienceFrom(?string $audienceFrom): self
    {
        $this->audienceFrom = $audienceFrom;

        return $this;
    }

    public function getAudienceTo(): ?string
    {
        return $this->audienceTo;
    }

    public function setAudienceTo(?string $audienceTo): self
    {
        $this->audienceTo = $audienceTo;

        return $this;
    }

    public function getAudienceCode(): ?array
    {
        return $this->audienceCode;
    }

    public function setAudienceCode(?array $audienceCode): self
    {
        $this->audienceCode = $audienceCode;

        return $this;
    }

    public function getHeightMeasurement(): ?string
    {
        return $this->heightMeasurement;
    }

    public function setHeightMeasurement(?string $heightMeasurement): self
    {
        $this->heightMeasurement = $heightMeasurement;

        return $this;
    }

    public function getWidthMeasurement(): ?string
    {
        return $this->widthMeasurement;
    }

    public function setWidthMeasurement(?string $widthMeasurement): self
    {
        $this->widthMeasurement = $widthMeasurement;

        return $this;
    }

    public function getThicknessMeasurement(): ?string
    {
        return $this->thicknessMeasurement;
    }

    public function setThicknessMeasurement(?string $thicknessMeasurement): self
    {
        $this->thicknessMeasurement = $thicknessMeasurement;

        return $this;
    }

    public function getWeightMeasurement(): ?string
    {
        return $this->weightMeasurement;
    }

    public function setWeightMeasurement(?string $weightMeasurement): self
    {
        $this->weightMeasurement = $weightMeasurement;

        return $this;
    }

    public function getHeightMeasureUnit(): ?string
    {
        return $this->heightMeasureUnit;
    }

    public function setHeightMeasureUnit(?string $heightMeasureUnit): self
    {
        $this->heightMeasureUnit = $heightMeasureUnit;

        return $this;
    }

    public function getWidthMeasureUnit(): ?string
    {
        return $this->widthMeasureUnit;
    }

    public function setWidthMeasureUnit(?string $widthMeasureUnit): self
    {
        $this->widthMeasureUnit = $widthMeasureUnit;

        return $this;
    }

    public function getThicknessMeasureUnit(): ?string
    {
        return $this->thicknessMeasureUnit;
    }

    public function setThicknessMeasureUnit(?string $thicknessMeasureUnit): self
    {
        $this->thicknessMeasureUnit = $thicknessMeasureUnit;

        return $this;
    }

    public function getWeightMeasureUnit(): ?string
    {
        return $this->weightMeasureUnit;
    }

    public function setWeightMeasureUnit(?string $weightMeasureUnit): self
    {
        $this->weightMeasureUnit = $weightMeasureUnit;

        return $this;
    }

    public function getDurationExtentValue(): ?string
    {
        return $this->durationExtentValue;
    }

    public function setDurationExtentValue(?string $durationExtentValue): self
    {
        $this->durationExtentValue = $durationExtentValue;

        return $this;
    }

    public function getFileSizeExtentValue(): ?string
    {
        return $this->fileSizeExtentValue;
    }

    public function setFileSizeExtentValue(?string $fileSizeExtentValue): self
    {
        $this->fileSizeExtentValue = $fileSizeExtentValue;

        return $this;
    }

    public function getDurationExtentUnit(): ?string
    {
        return $this->durationExtentUnit;
    }

    public function setDurationExtentUnit(?string $durationExtentUnit): self
    {
        $this->durationExtentUnit = $durationExtentUnit;

        return $this;
    }

    public function getFileSizeExtentUnit(): ?string
    {
        return $this->fileSizeExtentUnit;
    }

    public function setFileSizeExtentUnit(?string $fileSizeExtentUnit): self
    {
        $this->fileSizeExtentUnit = $fileSizeExtentUnit;

        return $this;
    }

    public function getNameCode(): ?string
    {
        return $this->nameCode;
    }

    public function setNameCode(?string $nameCode): self
    {
        $this->nameCode = $nameCode;

        return $this;
    }

    public function getNameCodeValue(): ?string
    {
        return $this->nameCodeValue;
    }

    public function setNameCodeValue(?string $nameCodeValue): self
    {
        $this->nameCodeValue = $nameCodeValue;

        return $this;
    }

    /**
     * @return Collection|Supplier[]
     */
    public function getSuppliers(): Collection
    {
        return $this->suppliers;
    }

    public function addSupplier(Supplier $supplier): self
    {
        if (!$this->suppliers->contains($supplier)) {
            $this->suppliers[] = $supplier;
            $supplier->setIdProduct($this);
        }

        return $this;
    }

    public function removeSupplier(Supplier $supplier): self
    {
        if ($this->suppliers->removeElement($supplier)) {
            // set the owning side to null (unless already changed)
            if ($supplier->getIdProduct() === $this) {
                $supplier->setIdProduct(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Contributor[]
     */
    public function getContributors(): Collection
    {
        return $this->contributors;
    }

    public function addContributor(Contributor $contributor): self
    {
        if (!$this->contributors->contains($contributor)) {
            $this->contributors[] = $contributor;
            $contributor->setIdProduct($this);
        }

        return $this;
    }

    public function removeContributor(Contributor $contributor): self
    {
        if ($this->contributors->removeElement($contributor)) {
            // set the owning side to null (unless already changed)
            if ($contributor->getIdProduct() === $this) {
                $contributor->setIdProduct(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|RelatedProduct[]
     */
    public function getRelatedProducts(): Collection
    {
        return $this->relatedProducts;
    }

    public function addRelatedProduct(RelatedProduct $relatedProduct): self
    {
        if (!$this->relatedProducts->contains($relatedProduct)) {
            $this->relatedProducts[] = $relatedProduct;
            $relatedProduct->setIdProduct($this);
        }

        return $this;
    }

    public function removeRelatedProduct(RelatedProduct $relatedProduct): self
    {
        if ($this->relatedProducts->removeElement($relatedProduct)) {
            // set the owning side to null (unless already changed)
            if ($relatedProduct->getIdProduct() === $this) {
                $relatedProduct->setIdProduct(null);
            }
        }

        return $this;
    }

    public function getMainDescription(): ?string
    {
        return $this->mainDescription;
    }

    public function setMainDescription(?string $mainDescription): self
    {
        $this->mainDescription = $mainDescription;

        return $this;
    }

    public function getTableContent(): ?string
    {
        return $this->tableContent;
    }

    public function setTableContent(?string $tableContent): self
    {
        $this->tableContent = $tableContent;

        return $this;
    }

    public function getBackCoverCopy(): ?string
    {
        return $this->backCoverCopy;
    }

    public function setBackCoverCopy(?string $backCoverCopy): self
    {
        $this->backCoverCopy = $backCoverCopy;

        return $this;
    }

    public function getBiographicalNoteCD(): ?string
    {
        return $this->biographicalNoteCD;
    }

    public function setBiographicalNoteCD(?string $biographicalNoteCD): self
    {
        $this->biographicalNoteCD = $biographicalNoteCD;

        return $this;
    }

    public function getExcerptBook(): ?string
    {
        return $this->excerptBook;
    }

    public function setExcerptBook(?string $excerptBook): self
    {
        $this->excerptBook = $excerptBook;

        return $this;
    }

    public function getReviewQuote(): ?string
    {
        return $this->reviewQuote;
    }

    public function setReviewQuote(?string $reviewQuote): self
    {
        $this->reviewQuote = $reviewQuote;

        return $this;
    }

    /**
     * @return Collection|Prize[]
     */
    public function getPrizes(): Collection
    {
        return $this->prizes;
    }

    public function addPrize(Prize $prize): self
    {
        if (!$this->prizes->contains($prize)) {
            $this->prizes[] = $prize;
            $prize->setIdProduct($this);
        }

        return $this;
    }

    public function removePrize(Prize $prize): self
    {
        if ($this->prizes->removeElement($prize)) {
            // set the owning side to null (unless already changed)
            if ($prize->getIdProduct() === $this) {
                $prize->setIdProduct(null);
            }
        }

        return $this;
    }

    public function getPromotionCampaign(): ?string
    {
        return $this->promotionCampaign;
    }

    public function setPromotionCampaign(?string $promotionCampaign): self
    {
        $this->promotionCampaign = $promotionCampaign;

        return $this;
    }

    public function getTypeILL(): ?string
    {
        return $this->typeILL;
    }

    public function setTypeILL(?string $typeILL): self
    {
        $this->typeILL = $typeILL;

        return $this;
    }

    public function getNumberILL(): ?string
    {
        return $this->numberILL;
    }

    public function setNumberILL(?string $numberILL): self
    {
        $this->numberILL = $numberILL;

        return $this;
    }

    public function getDescriptionILL(): ?string
    {
        return $this->descriptionILL;
    }

    public function setDescriptionILL(?string $descriptionILL): self
    {
        $this->descriptionILL = $descriptionILL; 

        return $this;
    }

    public function getWorkRelationCode(): ?string
    {
        return $this->workRelationCode;
    }

    public function setWorkRelationCode(?string $workRelationCode): self
    {
        $this->workRelationCode = $workRelationCode;

        return $this;
    }

    public function getWorkIDType(): ?string
    {
        return $this->workIDType;
    }

    public function setWorkIDType(string $workIDType): self
    {
        $this->workIDType = $workIDType;

        return $this;
    }

    public function getWorkIDValue(): ?string
    {
        return $this->workIDValue;
    }

    public function setWorkIDValue(?string $workIDValue): self
    {
        $this->workIDValue = $workIDValue;

        return $this;
    }

    /**
     * @return Collection|Images[]
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(Images $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images[] = $image;
            $image->setIdProduct($this);
        }

        return $this;
    }

    public function removeImage(Images $image): self
    {
        if ($this->images->removeElement($image)) {
            // set the owning side to null (unless already changed)
            if ($image->getIdProduct() === $this) {
                $image->setIdProduct(null);
            }
        }

        return $this;
    }
}
