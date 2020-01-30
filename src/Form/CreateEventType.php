<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Collection;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class CreateEventType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('title', TextType::class, [
            'label' => 'Títol de l\'acte'
        ])
        ->add('date', DateTimeType::class, [
            'label' => 'Data i hora'
        ])
        ->add('address', TextType::class, [
            'label' => 'Adreça'
        ])
        ->add('city', TextType::class, [
            'label' => 'Població'
        ])
        ->add('description', TextareaType::class, [
            'label' => 'Descprició'
        ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $collectionConstraint = new Collection(array(
            'title' => array(
                new NotBlank(array('message' => 'El títol no pot estar buit')),
                new Length(array('min' => 5, 'max' => 100))
            ),
            'date' => array(
                new NotBlank(array('message' => "La data i hora no pot estar buit"))
            ),
            'address' => array(
                new NotBlank(array('message' => 'L\'adreça no pot estar buida')),
                new Length(array('min' => 5, 'max' => 150))
            ),
            'city' => array(
                new NotBlank(array('message' => 'La població no pot estar buida')),
                new Length(array('min' => 5, 'max' => 150))
            ),
            'description' => array(
                new Length(array('min' => 0, 'max' => 200))
            )
        ));

        $resolver->setDefaults(array(
            'constraints' => $collectionConstraint
        ));
    }
}
