<?php

namespace App\Form;

use App\Entity\RelatedProduct;
use App\Repository\CodeListRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class RelatedProductFormType extends AbstractType
{
    private $codeListRepository;

    public function __construct(CodeListRepository $codeListRepository)
    {
        $this->codeListRepository = $codeListRepository;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('productRelationCode', ChoiceType::class, [
                'choices' => $this->codeListRepository->getKV($this->codeListRepository->findByTag("productRelationCode")),
                'multiple' => true,
                'required' => false
            ]) 
            ->add('relatedProductISBN', TextType::class, ['required' => false])
            ->add('productFormRP', ChoiceType::class, [
                'choices' => $this->codeListRepository->getKV($this->codeListRepository->findByTag("productForm")),
                'required' => false 
            ])
            ->add('productFormDetailRP', ChoiceType::class, [
                'choices' => $this->codeListRepository->getKV($this->codeListRepository->findByTag("productFormDetail")),
                'multiple' => true,
                'required' => false
            ]) 
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => RelatedProduct::class,
        ]);
    }
}
