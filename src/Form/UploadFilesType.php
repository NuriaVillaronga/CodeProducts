<?php

namespace App\Form;

use App\Entity\File;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UploadFilesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('files', FileType::class, [
                'label' => 'Upload a Onix file',
                //'multiple' => true,
                'mapped' => false,
                'required' => false,
                /*
                'constraints' => [
                    new File([
                        'mimeTypes' => [
                            'application/xml',
                        ],
                        'mimeTypesMessage' => 'Please upload a valid document',
                    ])
                ],
                */
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => File::class,
        ]);
    }
}
