<?php

namespace App\Form;

use App\Entity\Contributor;
use App\Repository\CodeListRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContributorFormType extends AbstractType
{
    private $codeListRepository;

    public function __construct(CodeListRepository $codeListRepository)
    {
        $this->codeListRepository = $codeListRepository;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('personName', TextType::class, [
                'required' => false
            ])
            ->add('namesBeforeKey', TextType::class, ['required' => false])
            ->add('keyNames', TextType::class, ['required' => false])
            ->add('personNameInverted', TextType::class, [
                'required' => false
            ])
            ->add('corporateName', TextType::class, ['required' => false])
            ->add('contributorRole', ChoiceType::class, [
                'choices' => $this->codeListRepository->getKV($this->codeListRepository->findByTag('contributorRole')),
                'multiple' => true,
                'required' => false
            ])      
            ->add('countryCode', ChoiceType::class, [
                'choices' => $this->codeListRepository->getKV($this->codeListRepository->findByTag('countryOfPublication_Manufacture')),
                'required' => false 
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contributor::class,
        ]);
    }
}
