<?php

namespace App\Form;

use App\Entity\Price;
use App\Repository\CodeListRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class PriceFormType extends AbstractType
{
    private $codeListRepository;

    public function __construct(CodeListRepository $codeListRepository)
    {
        $this->codeListRepository = $codeListRepository;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('priceAmount', TextType::class, ['required' => false])
            ->add('taxRatePercent', TextType::class, ['required' => false])
            ->add('taxAmount', TextType::class, ['required' => false])
            ->add('taxableAmount', TextType::class, ['required' => false])
            ->add('discountCode', TextType::class, ['required' => false])     
            ->add('discountCodeType', ChoiceType::class, [
                'choices' => $this->codeListRepository->getKV($this->codeListRepository->findByTag('discountCodeType')),
                'required' => false 
            ])
            ->add('countriesIncluded', ChoiceType::class, [
                'choices' => $this->codeListRepository->getKV($this->codeListRepository->findByTag('countryOfPublication_Manufacture')),
                'required' => false 
            ])
            ->add('currencyCode', ChoiceType::class, [
                'choices' => $this->codeListRepository->getKV($this->codeListRepository->findByTag('currencyCode')),
                'required' => false 
            ])
            ->add('taxRateCode', ChoiceType::class, [
                'choices' => $this->codeListRepository->getKV($this->codeListRepository->findByTag('taxRateCode')),
                'required' => false 
            ])
            ->add('priceType', ChoiceType::class, [
                'choices' => $this->codeListRepository->getKV($this->codeListRepository->findByTag('priceType')),
                'required' => false 
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Price::class,
        ]);
    }
}
