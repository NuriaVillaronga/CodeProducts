<?php

namespace App\Form;

use App\Entity\Product;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class TextFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('mainDescription', TextareaType::class, ['required' => false])
            ->add('tableContent', TextareaType::class, ['required' => false])
            ->add('backCoverCopy', TextareaType::class, ['required' => false])
            ->add('biographicalNoteCD', TextareaType::class, ['required' => false])
            ->add('excerptBook', TextareaType::class, ['required' => false])
            ->add('reviewQuote', TextareaType::class, ['required' => false])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
