<?php

namespace App\Form;

use App\Entity\Prize;
use App\Repository\CodeListRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class PrizeFormType extends AbstractType
{
    
    private $codeListRepository;

    public function __construct(CodeListRepository $codeListRepository)
    {
        $this->codeListRepository = $codeListRepository;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {

        $builder
            ->add('prizeName', TextType::class, ['required' => false])
            ->add('prizeCountry', ChoiceType::class, [
                'choices' => $this->codeListRepository->getKV($this->codeListRepository->findByTag('countryOfPublication_Manufacture')),
                'required' => false 
            ])
            ->add('prizeCode', ChoiceType::class, [
                'choices' => $this->codeListRepository->getKV($this->codeListRepository->findByTag('prizeCode')),
                'required' => false 
            ])
            ->add('prizeJury', TextareaType::class, ['required' => false])
            ->add('prizeYear', TextType::class, ['required' => false])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Prize::class,
        ]);
    }
}
