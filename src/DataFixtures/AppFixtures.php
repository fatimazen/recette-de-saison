<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $faker = Factory::create('fr_FR');
       for($i = 0; $i < 10; $i++)
       {

        $user = new User;
        $user 
        -> setUsername($faker->firstName().''.$faker->lastName())
        ->setAvatar($faker->imageUrl(640, 480, 'person', true))
        ->setEmail($faker->safeEmail())
        ->setPassword($faker->sha256())
        ->setIsSubscribed($faker->boolean())
        ->setRoles(['ROLE_USER'])
;
        $manager->persist($user);
        
       }
        $manager->flush();
    }
}
