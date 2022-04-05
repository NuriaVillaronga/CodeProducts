<?php

namespace App\Form;

use App\Entity\Product;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Repository\CodeListRepository;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class MeasureExtentFormType extends AbstractType
{
    private $codeListRepository;

    public function __construct(CodeListRepository $codeListRepository)
    {
        $this->codeListRepository = $codeListRepository;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('heightMeasurement', TextType::class, ['required' => false])
            ->add('heightMeasureUnit', ChoiceType::class, [
                'choices' => $this->codeListRepository->getKV($this->codeListRepository->findByTag('measureUnit')),
                'required' => false 
            ])
            ->add('widthMeasurement', TextType::class, ['required' => false])
            ->add('widthMeasureUnit', ChoiceType::class, [
                'choices' => $this->codeListRepository->getKV($this->codeListRepository->findByTag('measureUnit')),
                'required' => false 
            ])
            ->add('thicknessMeasurement', TextType::class, ['required' => false])
            ->add('thicknessMeasureUnit', ChoiceType::class, [
                'choices' => $this->codeListRepository->getKV($this->codeListRepository->findByTag('measureUnit')),
                'required' => false 
            ])
            ->add('weightMeasurement', TextType::class, ['required' => false])
            ->add('weightMeasureUnit', ChoiceType::class, [
                'choices' => $this->codeListRepository->getKV($this->codeListRepository->findByTag('measureUnit')),
                'required' => false 
            ])
            ->add('durationExtentValue', TextType::class, ['required' => false])
            ->add('durationExtentUnit', ChoiceType::class, [
                'choices' => $this->codeListRepository->getKV($this->codeListRepository->findByTag('extentUnit')),
                'required' => false 
            ])
            ->add('fileSizeExtentValue', TextType::class, ['required' => false])
            ->add('fileSizeExtentUnit', ChoiceType::class, [
                'choices' => $this->codeListRepository->getKV($this->codeListRepository->findByTag('extentUnit')),
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
