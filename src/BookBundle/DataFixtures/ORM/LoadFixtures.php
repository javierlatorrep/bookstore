<?php

namespace AppBundle\DataFixtures\ORM;

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
        $movies = [
            'Watchmen',
            'Seven',
            'The lion king',
            'Up in the air',
            'Braveheart',
            'Goldeneye',
            'Gladiator',
            'Aurelia',
            'Pompeya',
            'Star Wars IV: A new hope',
            'I robot',
            'La La Land',
            'Casino Royale',
            'Quantum of solace'
        ];
        
        $key = array_rand($movies);
        
        return $movies[$key];
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
