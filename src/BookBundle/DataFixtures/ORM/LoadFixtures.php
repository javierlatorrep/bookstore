<?php

namespace BookBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Nelmio\Alice\Fixtures;

class LoadFixtures implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $objects = Fixtures::load(
            __DIR__.'/fixtures.yml',
            $manager,
            [
                'providers' => [$this]
            ]
        );
    }
    
    public function title()
    {
        $books = [
            'Milk and Honey',
            'Everything, Everything',
            'Lincoln in the Bardo',
            'Norse Mythology',
            'The Lord of the Rings',
            'A Tale of Two Cities',
            'Le Petit Prince',
            'The Hobbit',
            'And Then There Were None',
            'The Da Vinci Code',
            'El alquimista',
            'Steps to Christ',
            'Anne of Green Gables',
            'Harry Potter and the Deathly Hallows',
            'La agonía del gran planeta Tierra',
            'Princesa mecánica',
            '¿Quién se ha llevado mi queso?',
            'El viento en los sauces',
            '1984',
            'Los juegos del hambre',
            'Las Nueve Revelaciones',
            'El Padrino',
            'Love Story',
            'Tótem Lobo',
            'La prostituta feliz',
            'Tiburón',
            'Siempre te querré',
            'El mundo de Sofía',
            'Sólo para mujeres, o simplemente Mujeres',
            'Qué esperar cuando se está esperando',
            'El sanador de caballos'
        ];
        
        $key = array_rand($books);
        
        return $books[$key];
    }
    
    public function edition()
    {
        $editions = [
            'Standar',
            'Premium',
            'Gold',
            'Special'
        ];
        
        $key = array_rand($editions);
        
        return $editions[$key];
    }
}
