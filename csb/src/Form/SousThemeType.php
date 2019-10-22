<?php

namespace App\Form;

use App\Entity\SousTheme;
use App\Entity\Themes;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SousThemeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                                ->add('themes',EntityType::class,[
                    'class' => Themes::class,
                    'choice_label' => 'titre',
                        'query_builder' => function(EntityRepository $repository){
                    return $repository->createQueryBuilder('t')
                          ->orderBy('t.titre','ASC');
            },
            'placeholder' => 'Faire votre choix',
            'multiple' => false,
            'data' => ''
                ] )
            ->add('titre')

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => SousTheme::class,
        ]);
    }
}
