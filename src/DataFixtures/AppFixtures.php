<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\User;
use App\Entity\Recipe;
use App\Entity\Season;
use DateTimeImmutable;
use App\Entity\Comment;
use App\Entity\Ingredient;
use App\Entity\Newsletter;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $faker = Factory::create('fr_FR');
        $users=[];
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
            $users []= $user;
        $manager->persist($user);
    }

    for($i = 0; $i < 10; $i++)
    {
        $ingredient = new Ingredient;
        $ingredient
        ->setName($faker->word())
        ->setType($faker->word())
        ->setDescription($faker->text())
        ->setImage($faker->imageUrl(640, 480, 'ingredient', true))
        ;
        $manager->persist($ingredient);
    }
       

    for($i = 0; $i < 10; $i++)
{
    $season = new Season;
    $season
    ->setName($faker->word())
    ->setStartAt(DateTimeImmutable::createFromMutable($faker->dateTime()))
    ->setEndAt(DateTimeImmutable::createFromMutable($faker->dateTime()))
    ;
    $manager->persist($season);
}
    $recipes = [];
for($i = 0; $i < 10; $i++)
{
    $recipe = new Recipe;
    $recipe
    ->setName($faker->word())
    ->setDescription($faker->text())
    ->setLevel($faker->randomNumber())
    ->setImage($faker->imageUrl(640, 480, 'recipe', true))
    ;
    $manager->persist($recipe);
    $recipes [] = $recipe;
}
 for ($i = 0; $i < 10; $i++)
 {
    $comment = new Comment;
    $comment
    ->setContent($faker->text())
    ->setUser($faker->randomElement($users))
    ->setRecipe($faker->randomElement($recipes))
    
    ;
    $manager->persist($comment);
 }
 for ($i = 0; $i <10; $i++)
 {
    $newsletter = new Newsletter;
    $newsletter
    ->setContent($faker->text())
    ->setSendAt(DateTimeImmutable::createFromMutable($faker->dateTime()))
    
    ;
    $manager->persist($newsletter);
 }

    $manager->flush();
}
}