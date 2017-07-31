<?php

namespace FaucheurBundle\Form;

use FaucheurBundle\Entity\Aptitude;
use FaucheurBundle\Entity\Association;
use FaucheurBundle\Entity\Mailing;
use FaucheurBundle\Entity\Proximite;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MilitantType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('email')
            ->add('telephone')
            ->add('adresse')
            ->add('codePostal')
            ->add('ville')
            ->add('facebook')
            ->add('twitter')
            ->add('notes')
            ->add('association', EntityType::class, array(
                'class' => Association::class,
                'choice_label' => 'nom',
            ))
            ->add('association', EntityType::class, array(
                'class' => Association::class,
                'choice_label' => 'nom',
            ))
            ->add('mailing', EntityType::class, array(
                'class' => Mailing::class,
                'choice_label' => 'nom',
                'multiple' => true
            ))
            ->add('mailing', EntityType::class, array(
                'class' => Mailing::class,
                'choice_label' => 'nom',
                'multiple' => true
            ))
            ->add('proximite', EntityType::class, array(
                'class' => Proximite::class,
                'choice_label' => 'nom',
            ))
            ->add('aptitude', EntityType::class, array(
                'class' => Aptitude::class,
                'choice_label' => 'nom',
            ))
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FaucheurBundle\Entity\Militant'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'faucheurbundle_militant';
    }


}
