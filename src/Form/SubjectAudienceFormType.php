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
        $builder
            ->add('bisacSubject', TextType::class, ['required' => false])
            //BISAC REGION
            ->add('subjectCode', TextType::class, ['required' => false])
            ->add('subjectSchemaVersion', TextType::class, ['required' => false])
            ->add('themaSubject', TextType::class, ['required' => false])
            //CLIL SUBJECT
            ->add('themesElectre', TextType::class, ['required' => false])
            ->add('subjectHeadingText', TextType::class, ['required' => false])
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
