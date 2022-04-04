<?php

namespace App\Form;

use App\Entity\Supplier;
use App\Repository\CodeListRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class SupplierFormType extends AbstractType
{
    private $codeListRepository;

    public function __construct(CodeListRepository $codeListRepository)
    {
        $this->codeListRepository = $codeListRepository;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('supplierName', TextType::class, ['required' => false])
        ->add('packQuantity', TextType::class, ['required' => false])    
        ->add('returnsCodeType', ChoiceType::class, [
            'choices' => $this->codeListRepository->getKV($this->codeListRepository->findByTag('returnsCodeType')),
            'required' => false 
        ])

        ->add('returnsCode', HiddenType::class, ['required' => false])

        ->add('onSaleDate', DateType::class, [
            'html5' => false,
            'widget' => 'single_text',
            'format' => 'yyyyMMdd',
            'required' => false
        ])

        ->add('expectedShipDate', DateType::class, [
            'html5' => false,
            'widget' => 'single_text',
            'format' => 'yyyyMMdd',
            'required' => false
        ])

        ->add('productAvailability', ChoiceType::class, [
            'choices' => $this->codeListRepository->getKV($this->codeListRepository->findByTag('productAvailability')),
            'required' => false 
        ])
        ->add('supplierRole', ChoiceType::class, [
            'choices' => $this->codeListRepository->getKV($this->codeListRepository->findByTag('supplierRole')),
            'required' => false 
        ])
        ->add('prices', CollectionType::class, [
            'entry_type' => PriceFormType::class, 
            'entry_options' => ['label' => false],
            'allow_delete' => true,
        ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Supplier::class,
        ]);
    }

}
