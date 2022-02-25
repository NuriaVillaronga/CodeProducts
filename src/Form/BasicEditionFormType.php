<?php

namespace App\Form;

use App\Entity\Product;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BasicEditionFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('recordReference', TextType::class)
            ->add('ISBN13', TextType::class)
            ->add('ISBN10', TextType::class, ['required' => false])
            ->add('EAN', TextType::class)
            ->add('titlePrefix', TextType::class, ['required' => false])
            ->add('titleWithoutPrefix', TextType::class, ['required' => false])
            ->add('titleText', TextType::class, ['required' => false])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
