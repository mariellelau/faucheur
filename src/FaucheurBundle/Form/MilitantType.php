<?php

namespace FaucheurBundle\Form;

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
            ->add('proximite')
            ->add('facebook')
            ->add('twitter')
            ->add('notes');
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
