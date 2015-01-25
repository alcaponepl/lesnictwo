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
            ->add('imie','text', array( 
                'label'=>'Imię',
                'attr'=> array('class'=>'form-control'), ))
            ->add('nazwisko','text', array( 
                'label'=>'Nazwisko',
                'attr'=> array('class'=>'form-control')))
            ->add('login','text', array( 
                'label'=>'Login',
                'attr'=> array('class'=>'form-control'),))
            ->add('email','text', array( 
                'label'=>'Email',
                'attr'=> array('class'=>'form-control'),))
            ->add('haslo','text', array( 
                'label'=>'Hasło',
                'attr'=> array('class'=>'form-control'),    ))
           // ->add('rodzaj')
            ->add('lesnictwo' ,'choice', array(
                'choices' => array('1' => 'Leśnictwo#1',
                                   '2' => 'Leśnictwo#2',
                                   '3' => 'Leśnictwo#3',
                                   '4' => 'Leśnictwo#4',
                                   '5' => 'Leśnictwo#5'
                                   ),
                'label'=>'Przypisz ID Leśnictwa',
                 'attr'=> array('class'=>'form-control'),))
            ->add('rodzaj', 'choice', array(  
                'label'=>'Uprawnienia',
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
