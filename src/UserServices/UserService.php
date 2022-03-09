<?php

namespace App\UserServices;

use App\Entity\Catalog;
use App\Entity\Contributor;
use App\Entity\File;
use App\Entity\Price;
use App\Entity\Prize;
use App\Entity\Product;
use App\Entity\RelatedProduct;
use App\Entity\Supplier;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use OnixComponents\ProductList;

class UserService extends CheckCredentials
{
    public function product_Update_Service(EntityManagerInterface $em, Product $product)
    {
        $em->persist($product);
        $em->flush();
    }

    public function supplier_Update_Service(EntityManagerInterface $em, Supplier $supplier)
    {
        $em->persist($supplier);
        $em->flush();
    }

    public function userDeleteService(User $user, EntityManagerInterface $em)
    {
        $user->setIsDeleted(true);
        $em->persist($user);
        $em->flush();
    }

    public function catalogService(Catalog $catalog, EntityManagerInterface $em)
    {
        $em->persist($catalog); 
        $em->flush();
    }

    public function catalogRemoveService(Catalog $catalog, EntityManagerInterface $em)
    {
        $em->remove($catalog);
        $em->flush();
    }

    public function fileRemoveService(File $file, EntityManagerInterface $em)
    {
        $em->remove($file);
        $em->flush();
    }

    public function deleteProductService(Product $product, EntityManagerInterface $em)
    {
        $em->remove($product);
        $em->flush();
    }

    public function userService(User $user, EntityManagerInterface $em)
    {
        $em->persist($user);
        $em->flush();
    }

    public function fileUploadService(File $file, EntityManagerInterface $em)
    {
        $em->persist($file);
        $em->flush();
    }

    private function saveProductService(Product $product, EntityManagerInterface $em)
    {
        $em->persist($product);
        $em->flush();
    }

    //GET VALUES FOR NODE's LIBRARY 
    public function productPackagingValue($product, $productXML) {
        if ($productXML->descriptiveDetail->productPackaging != null) {
            $product->setproductPackaging($productXML->descriptiveDetail->productPackaging->contents);
        }
    }

    public function primaryContentTypeValue($product, $productXML) {
        if ($productXML->descriptiveDetail->primaryContentType != null) {
            $product->setprimaryContentType($productXML->descriptiveDetail->primaryContentType->contents);
        } 
    }

    public function editionNumberValue($product, $productXML) {
        if ($productXML->descriptiveDetail->editionNumber != null) {
            $product->setEditionNumber($productXML->descriptiveDetail->editionNumber->contents);
        }
    }

    public function partNumberValue ($titleElement, $product) {
        if ($titleElement->partNumber != null) {
            $product->setPartNumber($titleElement->partNumber->contents);
        }
    }

    public function titleTextValue($titleElement, $product) {
        if ($titleElement->titleText != null) {
            $product->setTitleText($titleElement->titleText->contents);
        }
    }

    public function titlePrefixValue($titleElement, $product) {
        if ($titleElement->titlePrefix != null) {
            $product->setTitlePrefix($titleElement->titlePrefix->contents); 
        }
    }

    public function subtitleValue($titleElement, $product) {
        if ($titleElement->subtitle != null) {
            $product->setSubtitle($titleElement->subtitle->contents);
        }
    }

    public function titleWithoutPrefixValue($titleElement, $product) {
        if ($titleElement->titleWithoutPrefix != null) {
            $product->setTitleWithoutPrefix($titleElement->titleWithoutPrefix->contents);
        }
    }

    public function personNameValue($contributorONIX, $contributor) {
        if ($contributorONIX->personName != null) {
            $contributor->setPersonName($contributorONIX->personName->contents);
        }
    }

    public function keyNamesValue($contributorONIX, $contributor) {
        if ($contributorONIX->keyNames != null) {
            $contributor->setNamesBeforeKey($contributorONIX->keyNames->contents);
        }
    }

    public function namesBeforeKeyValue($contributorONIX, $contributor) {
        if ($contributorONIX->namesBeforeKey != null) {
            $contributor->setNamesBeforeKey($contributorONIX->namesBeforeKey->contents);
        } 
    }

    public function personNameInvertedValue($contributorONIX, $contributor) {
        if ($contributorONIX->personNameInverted != null) {
            $contributor->setPersonNameInverted($contributorONIX->personNameInverted->contents);
        }
    }

    public function corporateNameValue($contributorONIX, $contributor) {
        if ($contributorONIX->corporateName != null) {
            $contributor->setCorporateName($contributorONIX->corporateName->contents);
        } 
    }

    public function countryCodeContributorValue($contributorONIX, $contributor) { 
        if ($contributorONIX->contributorPlaceList != null) {
            foreach ($contributorONIX->contributorPlaceList->arrayContributorPlace as $contributorPlace) {
                $contributor->setCountryCode($contributorPlace->countryCode->contents);
                break;
            } 
        }
    }

    public function priceTypeValue($price, $priceONIX) {
        if ($priceONIX->priceType != null) {
            $price->setPriceType($priceONIX->priceType->contents);
        }
    }

    public function currencyCodeValue($price, $priceONIX) {
        if ($priceONIX->currencyCode != null) {
            $price->setCurrencyCode($priceONIX->currencyCode->contents);
        }
    }

    public function discountCodeValue($price, $priceONIX) {
        if ($priceONIX->discountCodedList != null) {
            foreach ($priceONIX->discountCodedList->arrayDiscountCoded as $discountCoded) {
                $price->setDiscountCode($discountCoded->discountCode->contents);
                break;
            }
        }
    }

    public function discountCodeTypeValue($price, $priceONIX) {
        if ($priceONIX->discountCodedList != null) {
            foreach ($priceONIX->discountCodedList->arrayDiscountCoded as $discountCoded) {
                $price->setDiscountCodeType($discountCoded->discountCodeType->contents);
                break;
            }
        }
    }

    public function taxRateCodeValue($tax, $price) {
        if ($tax->taxRateCode != null) {
            $price->setTaxRateCode($tax->taxRateCode->contents);
        }
    }

    public function taxableAmountValue($tax, $price) {
        if ($tax->taxableAmount != null) {
            $price->setTaxableAmount($tax->taxableAmount->contents);
        }
    }

    public function taxAmountValue($tax, $price) { 
        if ($tax->taxAmount != null) {
            $price->setTaxAmount($tax->taxAmount->contents);
        }
    }

    public function taxRatePercentValue($tax, $price) {
        if ($tax->taxRatePercent != null) {
            $price->setTaxRatePercent($tax->taxRatePercent->contents);
        }
    }
                        
    public function supplierNameValue($supplyDetail, $supplier) {
        if ($supplyDetail->supplier->supplierName != null) {
            $supplier->setSupplierName($supplyDetail->supplier->supplierName->contents);
        }
    }

    public function packQuantityValue($supplyDetail, $supplier) {
        if ($supplyDetail->packQuantity != null) {
            $supplier->setPackQuantity($supplyDetail->packQuantity->contents);
        }
    }

    public function returnsCodeValue($supplyDetail, $supplier) {
        if ($supplyDetail->returnsConditionsList != null) {
            foreach ($supplyDetail->returnsConditionsList->arrayReturnsConditions as $returnsConditions) {
                $supplier->setReturnsCode($returnsConditions->returnsCode->contents);
                break;
            }
        }
    }

    public function returnsCodeTypeValue($supplyDetail, $supplier) {
        if ($supplyDetail->returnsConditionsList != null) {
            foreach ($supplyDetail->returnsConditionsList->arrayReturnsConditions as $returnsConditions) {
                $supplier->setReturnsCodeType($returnsConditions->returnsCodeType->contents);
                break;
            }
        }
    }

    public function collectionValue($product, $productXML) {
        if ($productXML->descriptiveDetail->collectionList != null) {
            foreach ($productXML->descriptiveDetail->collectionList->arrayCollection as $collection) { 
                $product->setCollectionType($collection->collectionType->contents); 
                
                if ($collection->collectionSequenceList != null) {
                    foreach ($collection->collectionSequenceList->arrayCollectionSequence as $collectionSequence) {
                        $product->setCollectionSequenceNumber($collectionSequence->collectionSequenceNumber->contents); 
                        break;
                    }
                }

                if ($collection->titleDetailList != null) {
                    foreach ($collection->titleDetailList->arrayTitleDetail as $titleDetail) {
                        foreach ($titleDetail->titleElementList->arrayTitleElement as $titleElement) {
                            $this->partNumberValue($titleElement, $product);
                            $this->titleTextValue($titleElement, $product);
                            break;
                        }
                        break;
                    }
                }
                break;
            }
        }
    }

    public function titleDetailDDValue($product, $productXML) {
        foreach ($productXML->descriptiveDetail->titleDetailList->arrayTitleDetail as $titleDetail) {
            foreach ($titleDetail->titleElementList->arrayTitleElement as $titleElement) {
                $this->titleTextValue($titleElement, $product);
                $this->titleWithoutPrefixValue($titleElement, $product);
                $this->titlePrefixValue($titleElement, $product);
                $this->subtitleValue($titleElement, $product);
                break;
            }
            break;
        }
    }

    public function epubValue($product, $productXML) {
        if ($productXML->descriptiveDetail->epubTechnicalProtectionList != null) {
            foreach ($productXML->descriptiveDetail->epubTechnicalProtectionList->arrayEpubTechnicalProtection as $epubTechnicalProtection) {
                $product->setEpubTechnicalProtection($epubTechnicalProtection->contents);
                break;
            }
        }
    }

    public function measureValue($product, $productXML) {
        if ($productXML->descriptiveDetail->measureList != null) {
            
            foreach ($productXML->descriptiveDetail->measureList->arrayMeasure as $measure) {
                if ($measure->measureType->contents == "01") {
                    $product->setHeightMeasureUnit($measure->measureUnitCode->contents);
                    if ($measure->measurement != null) {
                        $product->setHeightMeasurement($measure->measurement->contents);
                    }
                }
                if ($measure->measureType->contents == "02") {
                    $product->setWidthMeasureUnit($measure->measureUnitCode->contents);
                    if ($measure->measurement != null) {
                        $product->setWidthMeasurement($measure->measurement->contents);
                    }
                }
                if ($measure->measureType->contents == "03") {
                    $product->setThicknessMeasureUnit($measure->measureUnitCode->contents);
                    if ($measure->measurement != null) {
                        $product->setThicknessMeasurement($measure->measurement->contents);
                    }
                }
                if ($measure->measureType->contents == "08") {
                    $product->setWeightMeasureUnit($measure->measureUnitCode->contents);
                    if ($measure->measurement != null) {
                        $product->setWeightMeasurement($measure->measurement->contents);
                    }
                }
                break;
            }
        }
    }

    public function extentListValue($product, $productXML) {
        if ($productXML->descriptiveDetail->extentList != null) {

            foreach ($productXML->descriptiveDetail->extentList->arrayExtent as $extent) {
                if ($extent->extentType->contents == "09") {
                    $product->setDurationExtentUnit($extent->extentUnit->contents);
                    if ($extent->extentValue != null) {
                        $product->setDurationExtentValue($extent->extentValue->contents);
                    }
                }
                if ($extent->extentType->contents == "22") {
                    $product->setFileSizeExtentUnit($extent->extentUnit->contents);
                    if ($extent->extentValue != null) {
                        $product->setFileSizeExtentValue($extent->extentValue->contents);
                    }
                }
                break;
            }
        }
    }

    public function productFormDetailValue($product, $productXML) {
        if ($productXML->descriptiveDetail->productFormDetailList != null) {

            $PFD = [];
            foreach ($productXML->descriptiveDetail->productFormDetailList->arrayProductFormDetail as $productFormDetail) {
                $PFD[] = $productFormDetail->contents;
            }
            $product->setproductFormDetail($PFD);
        }
    }

    public function languageCodeValue($product, $productXML) {
        if ($productXML->descriptiveDetail->languageList != null) {

            $languageCode = [];
            foreach ($productXML->descriptiveDetail->languageList->arrayLanguage as $language) {
                $languageCode[] = $language->languageCode->contents;
            }
            $product->setLanguageCode($languageCode);
        }
    }

    public function productIdentifierValue($product, $productXML) {
        foreach ($productXML->productIdentifierList->arrayProductIdentifier as $productIdentifier) {
            if ($productIdentifier->productIDType->contents == "15") {
                $product->setISBN13($productIdentifier->idValue->contents); //El ISBN13 es de tipo 15
            }
            else if ($productIdentifier->productIDType->contents == "02") {
                $product->setISBN10($productIdentifier->idValue->contents); //El ISBN10 es de tipo 02
            }
            else if ($productIdentifier->productIDType->contents == "03") {
                $product->setEAN($productIdentifier->idValue->contents); //El EAN es de tipo 03
            }   
            break;
        }
    }

    public function illustrationValue($product, $productXML) {
        if ($productXML->descriptiveDetail->ancillaryContentList != null) {
            foreach ($productXML->descriptiveDetail->ancillaryContentList->arrayAncillaryContent as $ac) {

                $product->setTypeILL($ac->ancillaryContentType->contents);
                $product->setNumberILL($ac->number->contents);

                if ($ac->AncillaryContentDescriptionList != null) {
                    foreach ($ac->AncillaryContentDescriptionList->arrayAncillaryContentDescription as $acDescription) {
                        $product->setDescriptionILL($acDescription->contents);
                        break;
                    }
                }
                break;
            }
        }
    }

    public function countryOfManufactureValue($product, $productXML) {
        if ($productXML->descriptiveDetail->countryOfManufacture != null) {
            $product->setCountryOfManufacture(str_word_count($productXML->descriptiveDetail->countryOfManufacture->contents, 1)); //Formato 1 devuelve array con los strings encontrados
        }
    }

    public function numberOfPagesValue($product, $productXML) {
        if ($productXML->contentDetail != null) {
            foreach ($productXML->contentDetail->contentItemList->arrayContentItem as $contentItem) {
                $product->setNumberOfPages($contentItem->textItem->numberOfPages->contents);  
                break;
            }
        }
    }

    public function barcodeValue($product, $productXML) {
        if ($productXML->barcodeList != null) {
            foreach ($productXML->barcodeList->arrayBarcode as $barcode) {
                $product->setBarcodeType($barcode->barcodeType->contents);
                break;
            }
        }
    }

    public function contributorValue($product, $productXML) {
        if ($productXML->descriptiveDetail->contributorList != null) {

            foreach ($productXML->descriptiveDetail->contributorList->arrayContributor as $contributorONIX) {
                
                $contributor = new Contributor();
                
                $this->personNameValue($contributorONIX, $contributor);
                $this->personNameInvertedValue($contributorONIX, $contributor);
                $this->keyNamesValue($contributorONIX, $contributor); 
                $this->namesBeforeKeyValue($contributorONIX, $contributor);
                $this->corporateNameValue($contributorONIX, $contributor);
                $this->countryCodeContributorValue($contributorONIX, $contributor);
                
                $contributorRole = [];
                foreach ($contributorONIX->contributorRoleList->arrayContributorRole as $cr) {
                    $contributorRole[] = $cr->contents;
                }
                $contributor->setContributorRole($contributorRole);   
                
                $product->addContributor($contributor); //Se le pasa al producto cada objeto contributor
            }
        }
    }

    public function prizeValue($product, $productXML) {
        if ($productXML->collateralDetail->prizeList != null) {
            foreach ($productXML->collateralDetail->prizeList->arrayPrize as $prizeONIX) {
                
                $prize = new Prize();

                $prize->setPrizeYear($prizeONIX->prizeYear->contents);
                $prize->setPrizeCountry($prizeONIX->prizeCountry->contents);
                $prize->setPrizeCode($prizeONIX->prizeCode->contents);
                
                foreach ($prizeONIX->prizeNameList->arrayPrizeName as $prizeName) {
                    $prize->setPrizeName($prizeName->contents);
                    break;
                } 

                if ($prizeONIX->prizeJuryList != null) {
                    foreach ($prizeONIX->prizeJuryList->arrayPrizeJury as $prizeJury) {
                        $prize->setPrizeJury($prizeJury->contents);
                        break;
                    }
                } 
                
                $product->addPrize($prize); //Se le pasa al producto cada objeto prize
            }
        }
    }

    public function textValue($product, $productXML) {
        foreach ($productXML->collateralDetail->textContentList->arrayTextContent as $textContent) {
            foreach ($textContent->textList->arrayText as $text) {
                if ($textContent->textType == "03") {
                    $product->setMainDescription($text->contents);
                }
                if ($textContent->textType == "04") {
                    $product->setTableContent($text->contents);
                }
                if ($textContent->textType == "05") {
                    $product->setBackCoverCopy($text->contents);
                }
                if ($textContent->textType == "06") {
                    $product->setReviewQuote($text->contents);
                }
                if ($textContent->textType == "12") {
                    $product->setBiographicalNoteCD($text->contents);
                }
                if ($textContent->textType == "14") { 
                     $product->setExcerptBook($text->contents);
                }
                break;
            }
            break;
        }
    }

    public function relatedWorkValue($product, $productXML) {
        if ($productXML->relatedMaterial->relatedWorkList != null) {
            foreach ($productXML->relatedMaterial->relatedWorkList->arrayRelatedWork as $rw) {

                $product->setWorkRelationCode($rw->workRelationCode->contents);

                foreach ($rw->workIdentifierList->arrayWorkIdentifier as $workIdentifier) {
                    $product->setWorkIDType($workIdentifier->workIDType->contents);
                    $product->setWorkIDValue($workIdentifier->idValue->contents);
                    break;
                }
                break;
            }
        }
    }

    public function relatedProductValue($product, $productXML) {
        if ($productXML->relatedMaterial->relatedProductList != null) {
            $countRelatedProduct = 0;
            foreach ($productXML->relatedMaterial->relatedProductList->arrayRelatedProduct as $rp) 
            {
                $countRelatedProduct++;
                if ($countRelatedProduct <=3) {
                    $relatedProduct = new RelatedProduct();

                    $productRelationCode = [];
                    foreach ($rp->productRelationCodeList->arrayProductRelationCode as $prCode) {
                        $productRelationCode[] = $prCode->contents;
                    }
                    $relatedProduct->setproductRelationCode($productRelationCode);

                    if ($rp->productFormDetailList != null) {
                        $productFormDetail = [];
                        foreach ($rp->productFormDetailList->arrayProductFormDetail as $pfDetail)  {
                            $productFormDetail[] = $pfDetail->contents;
                        }
                        $relatedProduct->setproductFormDetailRP($productFormDetail);
                    }
                    
                    foreach ($rp->productIdentifierList->arrayProductIdentifier as $productIdentifier) {
                        if ($productIdentifier->productIDType->contents == "15" || $productIdentifier->productIDType->contents == "03") {
                            $relatedProduct->setRelatedProductISBN($productIdentifier->idValue->contents);
                        }
                        break; 
                    }

                    if ($rp->productForm != null) {
                        $relatedProduct->setProductFormRP($rp->productForm->contents);
                    }

                    $product->addRelatedProduct($relatedProduct); //Se le pasa al producto cada objeto relatedProduct
                }
                else {
                    break;
                }
                
            }
        }
    }

    public function priceValue($supplyDetail, $supplier) {
        if ($supplyDetail->priceList != null) {

            foreach ($supplyDetail->priceList->arrayPrice as $priceOnix) {

                $price = new Price();

                $this->priceTypeValue($price, $priceOnix);
                $this->currencyCodeValue($price, $priceOnix);

                if ($priceOnix->territory != null) {
                    if ($priceOnix->territory->countriesIncluded != null) { 
                        $price->setCountriesIncluded($priceOnix->territory->countriesIncluded->contents);
                    }
                } 
                $this->discountCodeValue($price, $priceOnix);
                $this->discountCodeTypeValue($price, $priceOnix);
                
                if ($priceOnix->taxList != null) {
                    foreach ($priceOnix->taxList->arrayTax as $tax) {
                        $this->taxRateCodeValue($tax, $price); 
                        $this->taxableAmountValue($tax, $price);
                        $this->taxRatePercentValue($tax, $price);
                        $this->taxAmountValue($tax, $price);
                        break; 
                    }
                }
                $supplier->addPrice($price); //Se le pasa a supplier cada objeto price
            }
        }
    }

    public function supplierValue($productSupply, $product) {
        foreach ($productSupply->supplyDetailList->arraySupplyDetail as $supplyDetail) {

            $supplier = new Supplier();

            $this->supplierNameValue($supplyDetail, $supplier);
            $this->packQuantityValue($supplyDetail, $supplier);
            $this->returnsCodeTypeValue($supplyDetail, $supplier);
            $this->returnsCodeValue($supplyDetail, $supplier);
            $supplier->setSupplierRole($supplyDetail->supplier->supplierRole->contents);
            $supplier->setProductAvailability($supplyDetail->productAvailability->contents);
            $this->priceValue($supplyDetail, $supplier);
            
            $product->addSupplier($supplier); //Se le pasa al producto cada objeto supplier
        }
    }

    public function promotionCampaignValue($productSupply, $product) {
        if ($productSupply->marketPublishingDetail != null) {
            if ($productSupply->marketPublishingDetail->promotionCampaignList != null) {
                foreach ($productSupply->marketPublishingDetail->promotionCampaignList->arrayPromotionCampaign as $promotionCampaign) {
                    $product->setPromotionCampaign($promotionCampaign->contents);
                    break;
                } 
            }
        }
    }

    public function copyrightYearValue($product, $productXML) {
        if ($productXML->publishingDetail->copyrightStatementList != null) {
            foreach ($productXML->publishingDetail->copyrightStatementList->arrayCopyrightStatement as $copyrightStatement) {
                foreach ($copyrightStatement->copyrightYearList->arrayCopyrightYear as $copyrightYear) {
                    $product->setCopyrightYear($copyrightYear->contents);
                    break;
                }
                break;
            }
        }
    }

    public function publisherNameValue($product, $productXML) {
        if ($productXML->publishingDetail->publisherList != null) {
            foreach ($productXML->publishingDetail->publisherList->arrayPublisher as $publisher) {
                if ($publisher->publisherName != null) {
                    $product->setPublisherName($publisher->publisherName->contents); 
                }
                break;
            }
        }
    }

    public function cityOfPublicationValue($product, $productXML) {
        if ($productXML->publishingDetail->cityOfPublicationList != null) {
            foreach ($productXML->publishingDetail->cityOfPublicationList->arrayCityOfPublication as $cityOfPublication) {
                $product->setCityOfPublication($cityOfPublication->contents); 
                break;
            }
        }
    }

    public function countryOfPublicationValue($product, $productXML) {
        if ($productXML->publishingDetail->countryOfPublication != null) {
            $product->setCountryOfPublication(str_word_count($productXML->publishingDetail->countryOfPublication->contents, 1)); 
        }
    }

    public function publishingStatusValue($product, $productXML) {
        if ($productXML->publishingDetail->publishingStatus != null) {
            $product->setpublishingStatus($productXML->publishingDetail->publishingStatus->contents); 
        }
    }

    public function imprintValue($product, $productXML) {
        if ($productXML->publishingDetail->imprintList != null) {
            foreach ($productXML->publishingDetail->imprintList->arrayImprint as $imprint) {
                if ($imprint->imprintName != null) {
                    $product->setImprintName($imprint->imprintName->contents);
                }
                if ($imprint->imprintIdentifierList != null) {
                    foreach ($imprint->imprintIdentifierList->arrayImprintIdentifier as $imprintIdentifier) {
                        $product->setNameCode($imprintIdentifier->imprintIDType->contents); 
                        $product->setNameCodeValue($imprintIdentifier->idValue->contents);
                        break;
                    }
                }
                break;
            }
        }
    }

    public function subjectValue($product, $productXML) {
        if ($productXML->descriptiveDetail->subjectList != null) {
            foreach ($productXML->descriptiveDetail->subjectList->arraySubject as $subject) {
                if ($subject->subjectSchemeIdentifier->contents == "10") {
                    if ($subject->subjectCode->contents != null) {
                        $product->setBISACsubject($subject->subjectCode->contents); //El BISAC Subject es de tipo 10
                    }
                }
                else if ($subject->subjectSchemeIdentifier->contents == "11") {
                    if ($subject->subjectCode->contents != null) {
                        $product->setBISACregion($subject->subjectCode->contents); //El BISAC Region es de tipo 11
                    }
                }
                else if ($subject->subjectSchemeIdentifier->contents == "12") {
                    if ($subject->subjectCode->contents != null) {
                        $product->setBICsubject($subject->subjectCode->contents); //El BIC Subject es de tipo 12
                    }
                    if ($subject->subjectSchemeVersion->contents != null) {
                        $product->setBICversion($subject->subjectSchemeVersion->contents); //Si es del tipo BIC y tiene versión, se le establece
                    }
                }
                else if ($subject->subjectSchemeIdentifier->contents == "93") {
                    if ($subject->subjectCode->contents != null) {
                        $product->setThemaSubject($subject->subjectCode->contents); //Thema Subject es de tipo 93
                    }
                }
                else if ($subject->subjectSchemeIdentifier->contents == "28") {
                    if ($subject->subjectCode->contents != null) {
                        $product->setThemesElectra($subject->subjectCode->contents); //Themes Electra es de tipo 28
                    }
                }
                break;
            }
        }
    }

    public function audienceCodeValue($product, $productXML) {
        if ($productXML->descriptiveDetail->audienceCodeList != null) {
            $audienceCode = [];
            foreach ($productXML->descriptiveDetail->audienceCodeList->arrayAudienceCode as $ca) {
                $audienceCode[] = $ca->contents; 
            }
            $product->setAudienceCode($audienceCode);
        }
    }

    public function audienceRangeQualifierValue($product, $productXML) {
        if ($productXML->descriptiveDetail->audienceRangeList != null) {
            foreach ($productXML->descriptiveDetail->audienceRangeList->arrayAudienceRange as $ar) {
                $product->setAudienceRangeQualifier($ar->audienceRangeQualifier->contents);
                break;
            }
        }
    }

    public function toFromValue($product, $productXML) {
        if ($productXML->descriptiveDetail->audienceRangeList != null) {
            foreach ($productXML->descriptiveDetail->audienceRangeList->arrayAudienceRange as $audienceRange) {
                if ($audienceRange->audienceRangePrecision->contents == "03") {
                    $product->setAudienceFrom($audienceRange->audienceRangePrecision->contents); //From es de tipo 03
                }
                else if ($audienceRange->audienceRangePrecision->contents == "04") {
                    $product->setAudienceTo($audienceRange->audienceRangePrecision->contents); //To es de tipo 04
                }
                break;
            }
        }
    }

    public function productLoadService(User $user, File $file, Catalog $catalog, string $onixFile_directory, EntityManagerInterface $em)
    {
        $nodoONIX = simplexml_load_file($onixFile_directory."/".$file->getFile());

        $productList = new ProductList($nodoONIX);

        foreach ($productList->arrayProduct as $productXML) 
        {
            $product = new Product();

            $product->setNotificationType($productXML->notificationType->contents); 
            $product->setRecordReference($productXML->recordReference->contents);
            $this->productIdentifierValue($product, $productXML);
            $this->numberOfPagesValue($product, $productXML);
            $this->barcodeValue($product, $productXML);
            
            if ($productXML->descriptiveDetail != null) {
                $this->countryOfManufactureValue($product, $productXML); 
                $this->productPackagingValue($product, $productXML); 
                $this->primaryContentTypeValue($product, $productXML); 
                $this->editionNumberValue($product, $productXML); 
                $product->setproductForm($productXML->descriptiveDetail->productForm->contents); 
                $product->setproductComposition($productXML->descriptiveDetail->productComposition->contents);
                $this->productFormDetailValue($product, $productXML); 
                $this->languageCodeValue($product, $productXML); 
                $this->titleDetailDDValue($product, $productXML); 
                $this->collectionValue($product, $productXML);
                $this->epubValue($product, $productXML);   
                $this->measureValue($product, $productXML); 
                $this->extentListValue($product, $productXML);
                $this->illustrationValue($product, $productXML);
                $this->contributorValue($product, $productXML);
                $this->subjectValue($product, $productXML);
                $this->audienceCodeValue($product, $productXML);
                $this->audienceRangeQualifierValue($product, $productXML);
                $this->toFromValue($product, $productXML);
            }

            if ($productXML->collateralDetail != null) {
                $this->prizeValue($product, $productXML);
                $this->textValue($product, $productXML);
            }

            if ($productXML->relatedMaterial != null) {
                $this->relatedWorkValue($product, $productXML);
                $this->relatedProductValue($product, $productXML);
            }
            
            if ($productXML->productSupplyList != null) {
                foreach ($productXML->productSupplyList->arrayProductSupply as $productSupply) {
                    $this->promotionCampaignValue($productSupply, $product);
                    $this->supplierValue($productSupply, $product);
                    break; 
                }
            }
            
            if ($productXML->publishingDetail != null) {

                $this->imprintValue($product, $productXML);
                $this->publisherNameValue($product, $productXML);
                $this->copyrightYearValue($product, $productXML);
                $this->cityOfPublicationValue($product, $productXML); 
                $this->countryOfPublicationValue($product, $productXML);
                $this->publishingStatusValue($product, $productXML);

                if ($productXML->publishingDetail->publishingDateList != null) {
                    foreach ($productXML->publishingDetail->publishingDateList->arrayPublishingDate as $publishingDate) {
                        if ($publishingDate->publishingDateRole->contents == "01") {
                            $product->setpublishingDate($publishingDate->date->valor); //se establece $publishingDate
                            $product->setYearPublishingDate(date_format($publishingDate->date->valor, "Y")); //se establece $yearOfPublication  
                        }
                        break;
                    }
                }
            }

            //Le añado los productos al fichero y al catalogo
            $file->addProduct($product);
            $catalog->addProduct($product);
            $user->addProduct($product);
            $this->saveProductService($product, $em);
        }
    }
}