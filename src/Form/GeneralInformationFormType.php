<?php

namespace App\Form;

use App\Entity\Product;
use App\Repository\CodeListRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class GeneralInformationFormType extends AbstractType
{
    private $codeListRepository;

    public function __construct(CodeListRepository $codeListRepository)
    {
        $this->codeListRepository = $codeListRepository;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('subtitle', TextType::class, ['required' => false])
            ->add('notificationType', ChoiceType::class, [
                'choices' => $this->codeListRepository->getKV($this->codeListRepository->findByTag('notificationType')),
                'required' => false
            ])    
            ->add('epubTechnicalProtection', ChoiceType::class, [
                'choices' => $this->codeListRepository->getKV($this->codeListRepository->findByTag('epub')),
                'required' => false
            ])
            ->add('productForm', ChoiceType::class, [
                'choices' => $this->codeListRepository->getKV($this->codeListRepository->findByTag('productForm')),
                'required' => false  
            ])
            ->add('barcodeType', ChoiceType::class, [
                'choices' => $this->codeListRepository->getKV($this->codeListRepository->findByTag('barcodeType')),
                'required' => false
            ])
            ->add('productComposition', ChoiceType::class, [
                'choices' => $this->codeListRepository->getKV($this->codeListRepository->findByTag('productComposition')),
                'required' => false
            ])
            ->add('productPackaging', ChoiceType::class, [
                'choices' => $this->codeListRepository->getKV($this->codeListRepository->findByTag('productPackaging')),
                'required' => false 
            ])
            ->add('primaryContentType', ChoiceType::class, [
                'choices' => $this->codeListRepository->getKV($this->codeListRepository->findByTag('primaryContentType')),
                'required' => false
            ])
            ->add('publishingStatus', ChoiceType::class, [
                'choices' => $this->codeListRepository->getKV($this->codeListRepository->findByTag('publishingStatus')),
                'required' => false 
            ])      
            ->add('publisherName', TextType::class, ['required' => false])
            ->add('titleTextCollection', TextType::class, ['required' => false])
            ->add('numberOfPages', TextType::class, ['required' => false])
            ->add('collectionSequenceNumber', TextType::class, ['required' => false])
            ->add('partNumber', TextType::class, ['required' => false])
            ->add('cityOfPublication', TextType::class, ['required' => false])
            ->add('editionNumber', TextType::class, ['required' => false])
            ->add('copyrightYear', TextType::class, ['required' => false])

            ->add('publishingDate', DateType::class, [
                'html5' => false,
                'widget' => 'single_text',
                'format' => 'yyyyMMdd' //Formato en el que se va a guardar en la base de datos
            ])

            ->add('yearPublishingDate', TextType::class, ['required' => false])
            ->add('languageCode', ChoiceType::class, [
                'choices' => $this->codeListRepository->getKV($this->codeListRepository->findByTag('languageCode')),
                'multiple' => true,
                'required' => false
            ])
            ->add('countryOfPublication', ChoiceType::class, [
                'choices' => $this->codeListRepository->getKV($this->codeListRepository->findByTag('countryOfPublication_Manufacture')),
                'multiple' => true,
                'required' => false
            ])
            ->add('countryOfManufacture', ChoiceType::class, [
                'choices' => $this->codeListRepository->getKV($this->codeListRepository->findByTag('countryOfPublication_Manufacture')),
                'multiple' => true,
                'required' => false
            ])
            ->add('collectionType', ChoiceType::class, [
                'choices' => $this->codeListRepository->getKV($this->codeListRepository->findByTag('collectionType')),
                'required' => false
            ])
            ->add('productFormDetail', ChoiceType::class, [
                'choices' => $this->codeListRepository->getKV($this->codeListRepository->findByTag('productFormDetail')),
                'multiple' => true,
                'required' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
?>