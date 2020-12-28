<?php

namespace App\Form;

use App\Entity\Band;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;


class BandType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom du groupe'
            ])
            ->add('style', TextType::class, [
                'label' => 'Style du groupe'
            ])
            ->add('picture', TextType::class, [
                'label' => 'Nom de la photo'
            ])
            // ->add('picture', FileType::class, [
            //     'label' => 'Photo (jpg, png)',
            //     'mapped' => false,
            //     'required' => false,
            //     'constraints' => [
            //         new File([
            //             'maxSize' => '1024k',
            //             'mimeTypes' => [
            //                 'application/jpg',
            //                 'application/pdf',
            //             ],
            //             'mimeTypesMessage' => 'Veuillez choisir une image au format jpg ou png',
            //         ])
            //     ],
            // ])
            ->add('year_of_creation',DateType::Class, array(
                  'widget' => 'choice',
                  'format' =>'dd/MM/yyyy',
                  'years' => range(date('Y')-70, date('Y')+2),
            ))
            ->add('last_album_name', TextType::class, [
                'label' => 'Nom du dernier album'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Band::class,
        ]);
    }
}
