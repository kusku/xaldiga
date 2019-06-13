<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Collection;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class ContacteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('name', TextType::class, [
            'label' => 'tid_contacte_name_title'
        ])
        ->add('from', EmailType::class, [
            'label' => 'tid_contacte_email_title'
        ])
        ->add('phone', TelType::class, [
            'label' => 'tid_contacte_phone_title',
            'required' => false
        ])
        ->add('section', ChoiceType::class, [
            'label' => 'tid_contacte_sections_title',
            'choices' => [
                'Equip Permanent' => [
                    'Secretaria' => 'secretaria',
                    'Tresoreria' => 'tresoreria'
                ],
                'Seccions' => [
                    'Diables' => 'diables',
                    'Histrions' => 'histrions',
                    'Infantil' => 'infantil',
                    'Tabalers' => 'tabalers'
                ]
            ]
            ])
        ->add('message', TextareaType::class, [
            'label' => 'tid_contacte_message_title'
        ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $collectionConstraint = new Collection(array(
            'name' => array(
                new NotBlank(array('message' => 'El nombre no puede estar vacío.')),
                new Length(array('min' => 5))
            ),
            'from' => array(
                new NotBlank(array('message' => 'El email no puede estar vacío.')),
                new Email(array('message' => 'Email inválido.'))
            ),
            'phone' => array(
                new Length(array('min' => 9))
            ),
            'section' => array(),
            'message' => array(
                new NotBlank(array('message' => 'El mensaje no puede estar vacío.')),
                new Length(array('min' => 10))
            )
        ));

        $resolver->setDefaults(array(
            'constraints' => $collectionConstraint
        ));
    }
}
