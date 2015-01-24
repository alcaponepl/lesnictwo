<?php

namespace Lesnictwo\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UzytkownikType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('imie','text', array( 'label'=>'Imię' ))
            ->add('nazwisko','text', array( 'label'=>'Nazwisko' ))
            ->add('login','text', array( 'label'=>'Login' ))
            ->add('email','text', array( 'label'=>'Email' ))
            ->add('haslo','text', array( 'label'=>'Hasło' ))
           // ->add('rodzaj')
            ->add('lesnictwo' ,'text', array( 'label'=>'Przypisz ID Leśnictwa' ))
            ->add('rodzaj', 'choice', array(  'label'=>'Uprawnienia',
                                                'choices'   => array(
                                                                    'admin' => 'Administrator',
                                                                    'user' => 'Użytkownik (standardowy)',
     
                                                                    ),
                                                                    'expanded' => true,
                                                                    'multiple' => false,
                                                                    ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Lesnictwo\UserBundle\Entity\Uzytkownik'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'lesnictwo_userbundle_uzytkownik';
    }
}
