<?php

namespace App\Form;

use App\Entity\Product;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Repository\CodeListRepository;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class SubjectAudienceFormType extends AbstractType
{
    private $codeListRepository;

    public function __construct(CodeListRepository $codeListRepository)
    {
        $this->codeListRepository = $codeListRepository;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        /*CLIL SUBJECT*/
        $builder
            ->add('BISACsubject', ChoiceType::class, [
                'choices' => $this->codeListRepository->getKV($this->codeListRepository->findByTag('BISACsubject')),
                'required' => false 
            ])
            ->add('BISACregion', ChoiceType::class, [
                'choices' => $this->codeListRepository->getKV_Subject($this->codeListRepository->findByTag('BISACregion')),
                'required' => false 
            ])
            ->add('BICsubject', ChoiceType::class, [
                'choices' => $this->codeListRepository->getKV($this->codeListRepository->findByTag('BICsubject')),
                'required' => false 
            ])
            ->add('BICversion', TextType::class, ['required' => false])
            ->add('themaSubject', ChoiceType::class, [
                'choices' => $this->codeListRepository->getKV_Subject($this->codeListRepository->findByTag('themaSubject')),
                'required' => false 
            ])
            ->add('themesElectra', TextType::class, ['required' => false])
            ->add('audienceCode', ChoiceType::class, [
                'choices' => $this->codeListRepository->getKV($this->codeListRepository->findByTag('audienceCode')),
                'multiple' => true,
                'required' => false
            ])      
            ->add('audienceRangeQualifier', ChoiceType::class, [
                'choices' => $this->codeListRepository->getKV($this->codeListRepository->findByTag('audienceRangeQualifier')),
                'required' => false 
            ])
            ->add('audienceFrom', TextType::class, ['required' => false])
            ->add('audienceTo', TextType::class, ['required' => false])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
