<?php

namespace App\Form;

use App\Entity\Application;
use App\Entity\Project;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProjectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('expert')
            ->add('confirmed')
            ->add('junior')
            ->add('application', EntityType::class, ['class'=>Application::class, 'choice_label'=>'name'])
            ->add('projectFeatures', CollectionType::class, [
                'entry_type' => ProjectFeatureType::class,
                'entry_options' => ['label' => false],
                'label' => false,
                'by_reference' => false,
                'mapped' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Project::class,

        ]);
    }
}
