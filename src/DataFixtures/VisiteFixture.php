<?php

namespace App\DataFixtures;

use App\Entity\Visite;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class VisiteFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        
        $faker = Factory::create('fr_FR');

        for($k=0 ; $k<100 ; $k++){
            
            $visite = new Visite();
            $visite->setVille ($faker->city)
                   ->setPays ($faker->country)
                   ->setDatecreation ($faker->dateTime)
                   ->setTempmin ($faker->numberBetween (-20, 10))
                   ->setTempmax ($faker->numberBetween (10, 40))
                   ->setNote ($faker->numberBetween (0, 20))
                   ->setAvis ($faker->sentences (4, true));
            
                    $manager->persist($visite);
            
        }
        
        $manager->flush();
    }
}
