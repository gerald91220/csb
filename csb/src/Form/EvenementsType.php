<?php

namespace App\Form;

use App\Entity\Evenements;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\Resultats;
use App\Entity\SousTheme;
use Symfony\Component\Validator\Constraints\NotBlank;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Validator\Constraints\Length;

use Doctrine\ORM\EntityRepository;

class EvenementsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
              ->add('titre',TextType::class,[
                  'required' => false,
                  'constraints' => new NotBlank([
                     'message'=> 'le titre ne peut pas etre vide' 
                  ])
              ])
            ->add('description',TextType::class,[
                'required' => false,
                'constraints' =>  [new Length(['max' => 254])],
            ])    
            ->add('Contenu', TextareaType::class,[
                
                
            ])
                ->add('imageFile',VichFileType::class,[
            'required' => false,
            'allow_delete' => true, // not mandatory, default is true
            'download_link' => true, // not mandatory, default is true
            ])
            ->add('dateCreation',DateType::class,[
                        'widget' => 'single_text',
                        'format' => 'yyyy-MM-dd',   
                ])
            ->add('resultats',EntityType::class,[
                'class' => Resultats::class,
                    'label' => 'Resultats',
                    'translation_domain' => 'Default',
                    'required' => false,
                    'multiple' => true,
                    'placeholder' => 'Resultats'
                
                    ])
            ->add('sousThemes',EntityType::class,[
                'class' => SousTheme::class,
                'choice_label' => 'titre',
                    ])
            ->add('active',CheckboxType::class,[
                'label'    => 'Publier',
                'required' => false])    
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Evenements::class,
        ]);
    }
}
