<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class TestFixtures extends Fixture
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    /*
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

    /*
    descriptionILL;
    workRelationCode;
    workIDType
    workIDValue;

    id,file_id,catalog_id,user_id,record_reference,title_text,product_form,subject_heading_text,title_prefix,title_without_prefix,notification_type,product_form_detail,product_composition,collection_type,title_text_collection,publisher_name,publishing_date,publishing_status,city_of_publication,country_of_publication,country_of_manufacture,language_code,copyright_year,number_of_pages,edition_number,subtitle,collection_sequence_number,epub_technical_protection,product_packaging,primary_content_type,barcode_type,year_publishing_date,part_number,isbn13,isbn10,ean,bisac_subject,thema_subject,themes_electre,subject_schema_version,subject_code,audience_range_qualifier,audience_from,audience_to,audience_code,height_measurement,width_measurement,thickness_measurement,weight_measurement,height_measure_unit,width_measure_unit,thickness_measure_unit,weight_measure_unit,duration_extent_value,file_size_extent_value,duration_extent_unit,file_size_extent_unit,name_code,name_code_value,main_description,table_content,back_cover_copy,biographical_note_cd,excerpt_book,review_quote,promotion_campaign,type_ill,number_ill,description_ill,work_relation_code,work_idtype,work_idvalue
21,33,6,7,9788466427326,Clàssica,AJ,"; Novela histórica",NULL,NULL,03,"a:1:{i:0;s:4:"A103";}",00,11,NULL,"Grup 62",2018-02-12,04,NULL,"a:3:{i:0;s:2:"AE";i:1;s:2:"AO";i:2;s:2:"AU";}","a:5:{i:0;s:2:"BJ";i:1;s:2:"CV";i:2;s:2:"ET";i:3;s:2:"GG";i:4;s:2:"KH";}","a:1:{i:0;s:3:"bur";}",2007,wsdwd,NULL,123,NULL,00,09,06,02,2018,123,9788466427326,213123123,NULL,NULL,93,NULL,NULL,00013,NULL,NULL,NULL,a:0:{},NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,561.10,NULL,19,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,ghfhgfjfhghfjfhg,03,NULL,hjggjgjgj,NULL,NULL,NULL
22,33,6,7,9788475888569,"A TOT VENT-RÚST",AJ,"; Actualidad",NULL,NULL,03,"a:1:{i:0;s:4:"A103";}",00,11,NULL,"Grup 62",2021-02-02,08,NULL,a:0:{},a:0:{},"a:1:{i:0;s:3:"cat";}",2018,NULL,NULL,NULL,NULL,00,NULL,NULL,NULL,2021,NULL,9788475888569,NULL,NULL,NULL,93,NULL,NULL,00030,NULL,NULL,NULL,a:0:{},NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,699.08,NULL,19,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL
23,34,6,7,9788466427326,Clàssica,AJ,"; Novela histórica",NULL,NULL,03,"a:1:{i:0;s:4:"A103";}",00,11,NULL,"Grup 62",2018-02-18,04,NULL,a:0:{},a:0:{},"a:1:{i:0;s:3:"cat";}",2007,NULL,NULL,NULL,NULL,00,NULL,NULL,NULL,2018,NULL,9788466427326,NULL,NULL,NULL,93,NULL,NULL,00013,NULL,NULL,NULL,a:0:{},NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,561.10,NULL,19,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL
24,34,6,7,9788475888569,"A TOT VENT-RÚST",AJ,"; Actualidad",NULL,NULL,03,"a:1:{i:0;s:4:"A103";}",00,11,NULL,"Grup 62",2021-02-02,08,NULL,a:0:{},a:0:{},"a:1:{i:0;s:3:"cat";}",2018,NULL,NULL,NULL,NULL,00,NULL,NULL,NULL,2021,NULL,9788475888569,NULL,NULL,NULL,93,NULL,NULL,00030,NULL,NULL,NULL,a:0:{},NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,699.08,NULL,19,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL
25,37,6,7,com.globalbookinfo.onix.01734529,NULL,BC,"; Martin Beck; Roseanna McGraw; Lake Vättern; Stockholm; police procedural",NULL,Roseanna,03,"a:1:{i:0;s:4:"B105";}",00,10,NULL,"HarperCollins Publishers",2006-08-07,04,London,"a:1:{i:0;s:2:"GB";}","a:1:{i:0;s:2:"GB";}","a:2:{i:0;s:3:"eng";i:1;s:3:"swe";}",NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2006,NULL,NULL,NULL,9780007232833,10,93,20,2017,FIC022000,NULL,NULL,NULL,a:0:{},197,NULL,NULL,NULL,mm,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,01,11,A0220090000154FA
26,38,6,7,com.globalbookinfo.onix.01734529,NULL,BC,"; Martin Beck; Roseanna McGraw; Lake Vättern; Stockholm; police procedural",NULL,Roseanna,03,"a:1:{i:0;s:4:"B105";}",00,10,NULL,"HarperCollins Publishers",2006-08-07,04,London,"a:1:{i:0;s:2:"GB";}","a:1:{i:0;s:2:"GB";}","a:2:{i:0;s:3:"eng";i:1;s:3:"swe";}",NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2006,NULL,NULL,NULL,9780007232833,10,93,20,2017,FIC022000,NULL,NULL,NULL,a:0:{},197,NULL,NULL,NULL,mm,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,01,11,A0220090000154FA
27,39,6,7,9788466427326,Clàssica,AJ,"; Novela histórica",NULL,NULL,03,"a:1:{i:0;s:4:"A103";}",00,11,NULL,"Grup 62",2018-02-23,04,NULL,a:0:{},a:0:{},"a:1:{i:0;s:3:"cat";}",2007,NULL,NULL,NULL,NULL,00,NULL,NULL,NULL,2018,NULL,9788466427326,NULL,NULL,NULL,93,NULL,NULL,00013,NULL,NULL,NULL,a:0:{},NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,561.10,NULL,19,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL
28,39,6,7,9788475888569,"A TOT VENT-RÚST",AJ,"; Actualidad",NULL,NULL,03,"a:1:{i:0;s:4:"A103";}",00,11,NULL,"Grup 62",2021-02-02,08,NULL,a:0:{},a:0:{},"a:1:{i:0;s:3:"cat";}",2018,NULL,NULL,NULL,NULL,00,NULL,NULL,NULL,2021,NULL,9788475888569,NULL,NULL,NULL,93,NULL,NULL,00030,NULL,NULL,NULL,a:0:{},NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,699.08,NULL,19,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL
*/

    private function getProducts():array
    {
        return [
            0 => [
                'name'  => '9788466427326',
                'email' => 'nuria.villaronga@gmail.com',
                'role' => ['ROLE_ADMIN','ROLE_USER'],
                'password' => 'nuria',
                'active' => true,
                'deleted' => false
            ],
            1 => [
                'name'  => 'Milena Villaronga',
                'email' => 'milena.villaronga@gmail.com',
                'role' => ['ROLE_USER'],
                'password' => 'milena',
                'active'    => true,
                'deleted' => true
            ]
        ];
    }

    private function getUsers():array
    {
        return [
            0 => [
                'name'  => 'Nuria Villaronga',
                'email' => 'nuria.villaronga@gmail.com',
                'role' => ['ROLE_ADMIN','ROLE_USER'],
                'password' => 'nuria',
                'active' => true,
                'deleted' => false
            ],
            1 => [
                'name'  => 'Milena Villaronga',
                'email' => 'milena.villaronga@gmail.com',
                'role' => ['ROLE_USER'],
                'password' => 'milena',
                'active'    => true,
                'deleted' => true
            ],
            2 => [
                'name'  => 'Juana Villaronga',
                'email' => 'juana.villaronga@gmail.com',
                'role' => ['ROLE_USER'],
                'password' => 'juana',
                'active'    => true,
                'deleted' => false
            ],
            3 => [
                'name'  => 'Dalila Villaronga',
                'email' => 'dalila.villaronga@gmail.com',
                'role' => ['ROLE_USER'],
                'password' => 'dalila',
                'active'    => true,
                'deleted' => false
            ]
        ];
    }
    
    public function load(ObjectManager $manager)
    {
        $usersData = $this->getUsers();

        foreach ($usersData as $user) {
            $newUser = new User();
            $newUser->setName($user['name']);
            $newUser->setEmail($user['email']);
            $newUser->setRoles($user['role']);
            $newUser->setPassword($this->passwordHasher->hashPassword($newUser, $user['password']));
            $newUser->setIsActive($user['active']);
            $newUser->setIsDeleted($user['deleted']);
            $manager->persist($newUser);
        }

        $manager->flush();
    }
}