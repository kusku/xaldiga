<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Collection;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class NewUserFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('_name', TextType::class)
        // ->add('nif', TextType::class)
        // ->add('birthday', DateType::class)
        // ->add('address', TextType::class)
        // ->add('city', TextType::class)
        // ->add('province', TextType::class)
        // ->add('zipcode', NumberType::class)
        // ->add('email', EmailType::class)
        // ->add('phone', TelType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        // $collectionConstraint = new Collection(array(
        //     '_name' => array(
        //     )
        //     // ),
        //     // 'from' => array(
        //     //     new NotBlank(array('message' => 'El email no puede estar vacío.')),
        //     //     new Email(array('message' => 'Email inválido.'))
        //     // )
        //     // ),
        //     // 'phone' => array(
        //     //     new Length(array('min' => 9))
        //     // )
        // ));

        // $resolver->setDefaults(array(
        //     'constraints' => $collectionConstraint
        // ));
    }
}
