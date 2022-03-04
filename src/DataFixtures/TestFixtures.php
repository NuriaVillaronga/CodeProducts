<?php

namespace App\DataFixtures;

use App\Entity\Contributor;
use App\Entity\Price;
use App\Entity\Prize;
use App\Entity\RelatedProduct;
use App\Entity\Supplier;
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

    //Añadir datos para todas las bases:
    //catalog
    //code_list
    //file
    //images

    private function getProducts():array
    {
        //--Subject & Audience
            /*
            'subjectHeadingText' => '',
            'bisacSubject' => '',
            'themaSubject' => '',
            'themesElectre' => '',
            'subjectSchemaVersion'  => '',
            'subjectCode' => '',
            'audienceRangeQualifier' => '', 
            'audienceFrom' => '',
            'audienceTo' => '',
            'audienceCode' => []   
            */

        //Falta file, user, catalog
        return [
            0 => [
                'file'  => '',
                'catalog' => '',
                'user' => '', 
                'recordReference' => 'com.globalbookinfo.onix.01734529',
                'titleText' => 'A TOT VENT-RÚST',
                'titlePrefix' => '',
                'titleWithoutPrefix' => '',
                'ISBN13' => '',
                'ISBN10'  => '',
                'EAN' => '',
                'notificationType' => '08', 
                'epubTechnicalProtection' => '',
                'productForm' => 'BC',
                'barcodeType' => '',
                'primaryContentType'  => '',
                'productPackaging' => '',
                'productComposition' => '00', 
                'publisherName' => 'Grup 62',
                'titleTextCollection' => '',
                'collectionType' => '10',
                'collectionSequenceNumber' => '',
                'subtitle' => '',
                'publishingStatus'  => '04',
                'publishingDate' => '2021-02-02',
                'partNumber' => '', 
                'yearPublishingDate' => '',
                'editionNumber' => '',
                'cityOfPublication' => '',
                'copyrightYear'  => '2017',
                'countryOfManufacture' => ['GB'],
                'countryOfPublication' => ['AE','AO','AU'], 
                'languageCode' => ['eng','swe'],
                'productFormDetail' => ['A305','B103','E212'], 
                'nameCode' => '', 
                'nameCodeValue' => '',
                'mainDescription' => '', 
                'tableContent' => '',
                'backCoverCopy' => '',
                'biographicalNoteCD' => '',
                'excerptBook' => '',
                'reviewQuote' => '',
                'heightMeasurement' => '', 
                'widthMeasurement' => '',
                'weightMeasurement' => '',
                'thicknessMeasurement' => '',
                'heightMeasureUnit' => '',
                'widthMeasureUnit' => '',
                'thicknessMeasureUnit'  => '',
                'weightMeasureUnit' => '',
                'durationExtentValue' => '', 
                'fileSizeExtentValue' => '',
                'durationExtentUnit' => '',
                'fileSizeExtentUnit' => '',
                'typeILL' => '',
                'numberILL' => '',
                'descriptionILL' => '',
                'workRelationCode' => '01',
                'workIDType' => '11',
                'workIDValue' => 'A0220090000154FA',
                'promotionCampaign' => '',
            ],
            1 => [
                'file'  => '',
                'catalog' => '',
                'user' => '', 
                'recordReference' => '9788466427326',
                'titleText' => 'Clàssica',
                'titlePrefix' => '',
                'titleWithoutPrefix' => '',
                'ISBN13' => '',
                'ISBN10'  => '',
                'EAN' => '',
                'notificationType' => '05', 
                'epubTechnicalProtection' => '',
                'productForm' => 'AJ',
                'barcodeType' => '',
                'primaryContentType'  => '',
                'productPackaging' => '',
                'productComposition' => '00', 
                'publisherName' => 'HarperCollins Publishers',
                'titleTextCollection' => '',
                'collectionType' => '11',
                'collectionSequenceNumber' => '',
                'subtitle' => '',
                'publishingStatus'  => '08',
                'publishingDate' => '2006-08-07',
                'partNumber' => '', 
                'yearPublishingDate' => '',
                'editionNumber' => '',
                'cityOfPublication' => '',
                'copyrightYear'  => '2019',
                'countryOfManufacture' => ['BJ','CV','ET','GG'],
                'countryOfPublication' => ['CK'], 
                'languageCode' => ['cat','bur'],
                'productFormDetail' => ['A441','E101'], 
                'nameCode' => '', 
                'nameCodeValue' => '',
                'mainDescription' => '', 
                'tableContent' => '',
                'backCoverCopy' => '',
                'biographicalNoteCD' => '',
                'excerptBook' => '',
                'reviewQuote' => '',
                'heightMeasurement' => '', 
                'widthMeasurement' => '',
                'weightMeasurement' => '',
                'thicknessMeasurement' => '',
                'heightMeasureUnit' => '',
                'widthMeasureUnit' => '',
                'thicknessMeasureUnit'  => '',
                'weightMeasureUnit' => '',
                'durationExtentValue' => '', 
                'fileSizeExtentValue' => '',
                'durationExtentUnit' => '',
                'fileSizeExtentUnit' => '',
                'typeILL' => '',
                'numberILL' => '',
                'descriptionILL' => '',
                'workRelationCode' => '04',
                'workIDType' => '11',
                'workIDValue' => '0A920080000000FC',
                'promotionCampaign' => '',
            ]
        ];
    }

    private function getContributors():array
    {
        //Falta idProduct
        return [
            0 => [
                'idProduct'  => '',
                'personName' => 'Joan Margarit',
                'keyNames' => 'Smith', 
                'namesBeforeKey' => 'Joan',
                'personNameInverted' => 'Margarit, Joan',
                'corporateName' => 'Apple Sw',
                'countryCode' => 'GS',
                'contributorRole' => ['B06']
            ],
            1 => [
                'idProduct'  => '',
                'personName' => 'Martí Gironell',
                'keyNames' => '', 
                'namesBeforeKey' => 'Martí',
                'personNameInverted' => 'Gironell, Martí',
                'corporateName' => 'Johnson Inc',
                'countryCode' => 'VG',
                'contributorRole' => ['A03','A45','A48']
            ],
            2 => [
                'idProduct'  => '',
                'personName' => 'Jordi Coromina',
                'keyNames' => '',  
                'namesBeforeKey' => 'Jordi',
                'personNameInverted' => 'Coromina, Jordi',
                'corporateName' => '', 
                'countryCode' => 'US', 
                'contributorRole' => ['A24','E03']
            ]
        ];
    }

    private function getPrizes():array
    {  
        //Falta idProduct
        return [
            0 => [
                'idProduct'  => '',
                'prizeName' => 'Reader Of Year Prize',
                'prizeCountry' => 'BQ', 
                'prizeCode' => '05',
                'prizeJury' => '',
                'prizeYear' => '2014'
            ],
            1 => [
                'idProduct'  => '',
                'prizeName' => 'Man Booker Prize',
                'prizeCountry' => 'AU', 
                'prizeCode' => '01',
                'prizeJury' => 'Russell Banks, Victoria Glendinning y Alistair MacLeod',
                'prizeYear' => '2018'
            ]
        ];
    }

    private function getPrices():array
    {
        //Falta idSupplier
        return [
            0 => [
                'idSupplier'  => '',
                'priceType' => '09',
                'taxRateCode' => 'P', 
                'taxableAmount' => '10.64',
                'taxAmount' => '1.02',
                'currencyCode' => 'KHR',
                'countriesIncluded' => ['AT','BE','CY','FI','FR','DE','ES'],
                'discountCodeType' => '04',
                'discountCode' => 'AHACP029',
                'taxRatePercent' => '22.56'
            ],
            1 => [
                'idSupplier'  => '',
                'priceType' => '14',
                'taxRateCode' => 'S', 
                'taxableAmount' => '17.13',
                'taxAmount' => '0.85',
                'currencyCode' => 'BAM',
                'countriesIncluded' => ['MT','NL','PT','SI','SK','AD','MC','ME','SM','VA'],
                'discountCodeType' => '06',
                'discountCode' => 'AHACP017',
                'taxRatePercent' => '28.1'
            ],
            2 => [
                'idSupplier'  => '',
                'priceType' => '25',
                'taxRateCode' => 'Z', 
                'taxableAmount' => '12.59', 
                'taxAmount' => '0.79',
                'currencyCode' => 'CZK',
                'countriesIncluded' => ['SK','AD','MC','AT','BE'],
                'discountCodeType' => '01',
                'discountCode' => 'AHACP033',
                'taxRatePercent' => '17.5'
            ]
        ];
    }

    private function getRelatedProducts():array
    {
        //Falta idProduct
        return [
            0 => [
                'idProduct'  => '',
                'productRelationCode' => ['08','32'],
                'productFormDetailRP' => ['A402','B120','B108','B114'],
                'productFormRP' => 'DF',
                'relatedProductISBN' => '9788499304250'
            ],
            1 => [
                'idProduct'  => '',
                'productRelationCode' => ['06','27'],
                'productFormDetailRP' => ['D321'],
                'productFormRP' => '',
                'relatedProductISBN' => '9788417423377'
            ],
            2 => [
                'idProduct'  => '',
                'productRelationCode' => ['23'],
                'productFormDetailRP' => [],
                'productFormRP' => 'BN',
                'relatedProductISBN' => '9788492549092'
            ]
        ];
    }

    private function getSuppliers():array
    {
        //Falta idProduct
        return [
            0 => [
                'idProduct'  => '',
                'supplierRole' => '06',
                'productAvailability' => '20',
                'returnsCodeType' => '02',
                'returnsCode' => 'Y',
                'packQuantity' => '16',
                'supplierName' => 'HarperCollins Publishers'
            ],
            1 => [
                'idProduct'  => '',
                'supplierRole' => '01',
                'productAvailability' => '40',
                'returnsCodeType' => '',
                'returnsCode' => '',
                'packQuantity' => '',
                'supplierName' => 'Grupo Planeta - Distribuidor'
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

        $suppliersData = $this->getSuppliers();
        foreach ($suppliersData as $supplier) {
            $newSupplier = new Supplier();
            $newSupplier->setIdProduct($supplier['idProduct']);
            $newSupplier->setSupplierRole($supplier['supplierRole']);
            $newSupplier->setProductAvailability($supplier['productAvailability']);
            $newSupplier->setReturnsCodeType($supplier['returnsCodeType']);
            $newSupplier->setReturnsCode($supplier['returnsCode']);
            $newSupplier->setPackQuantity($supplier['packQuantity']);
            $newSupplier->setSupplierName($supplier['supplierName']);
            $manager->persist($newSupplier);
        }


        $relatedProductsData = $this->getRelatedProducts();
        foreach ($relatedProductsData as $relatedProduct) {
            $newRelatedProduct = new RelatedProduct();
            $newRelatedProduct->setIdProduct($relatedProduct['idProduct']);
            $newRelatedProduct->setProductRelationCode($relatedProduct['productRelationCode']);
            $newRelatedProduct->setProductFormDetailRP($relatedProduct['productFormDetailRP']);
            $newRelatedProduct->setProductFormRP($relatedProduct['productFormRP']);
            $newRelatedProduct->setRelatedProductISBN($relatedProduct['relatedProductISBN']);
            $manager->persist($newRelatedProduct);
        }

        $pricesData = $this->getPrices();
        foreach ($pricesData as $price) {
            $newPrice = new Price();
            $newPrice->setIdSupplier($price['idSupplier']);
            $newPrice->setPriceType($price['priceType']);
            $newPrice->setTaxRateCode($price['taxRateCode']);
            $newPrice->setTaxableAmount($price['taxableAmount']);
            $newPrice->setTaxAmount($price['taxAmount']);
            $newPrice->setCurrencyCode($price['currencyCode']); 
            $newPrice->setCountriesIncluded($price['countriesIncluded']);
            $newPrice->setDiscountCodeType($price['discountCodeType']); 
            $newPrice->setDiscountCode($price['discountCode']);
            $newPrice->setTaxRatePercent($price['taxRatePercent']); 
            $manager->persist($newPrice);
        }


        $prizesData = $this->getPrizes();
        foreach ($prizesData as $prize) {
            $newPrize = new Prize();
            $newPrize->setIdProduct($prize['idProduct']);
            $newPrize->setPrizeName($prize['prizeName']);
            $newPrize->setPrizeCountry($prize['prizeCountry']);
            $newPrize->setPrizeCode($prize['prizeCode']);
            $newPrize->setPrizeJury($prize['prizeJury']);
            $newPrize->setPrizeYear($prize['prizeYear']);
            $manager->persist($newPrize); 
        }


        $contributorsData = $this->getContributors();
        foreach ($contributorsData as $contributor) {
            $newContributor = new Contributor();
            $newContributor->setIdProduct($contributor['idProduct']); 
            $newContributor->setPersonName($contributor['personName']);
            $newContributor->setKeyNames($contributor['keyNames']);
            $newContributor->setNamesBeforeKey($contributor['namesBeforeKey']);
            $newContributor->setPersonNameInverted($contributor['personNameInverted']);
            $newContributor->setCorporateName($contributor['corporateName']); 
            $newContributor->setCountryCode($contributor['countryCode']);
            $newContributor->setContributorRole($contributor['contributorRole']);
            $manager->persist($newContributor);  
        }

        $manager->flush();
    }
}