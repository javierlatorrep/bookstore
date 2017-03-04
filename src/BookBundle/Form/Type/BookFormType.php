<?php

namespace BookBundle\Form\Type;

use BookBundle\Entity\Book;
use BookBundle\Entity\Author;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BookFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('authors', EntityType::class, [
                'class'        => Author::class,
                'multiple'     => true,
                'expanded'     => true,
                'choice_label' => function ($author) {
                    return $author->getFullName();
                },
            ])
            ->add('publicationDate', DateType::class, [
                'widget' => 'single_text'
            ])
            ->add('edition')
            ->add('price')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Book::class
        ));
    }
} 
