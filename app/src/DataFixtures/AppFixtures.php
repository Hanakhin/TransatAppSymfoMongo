<?php

namespace App\DataFixtures;

use App\Document\jeu;
use App\Document\Reservation;
use App\Document\Transat;
use App\Document\User;
use Cassandra\Date;
use Doctrine\Bundle\MongoDBBundle\Fixture\Fixture as MongoDBFixture;
use Doctrine\ODM\MongoDB\MongoDBException;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends MongoDBFixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $hanakhin = new User();
        $hanakhin->setFirstname('Hanakhin')
            ->setLastname('Nouni')
            ->setEmail('hanakhin@gmail.com')
            ->setPassword('hanakhin')
            ->setRole('ROLE_ADMIN');


        $reservation = new Reservation();
        $reservation->setDate(new \DateTime('now'))
            ->setEmplacement('paris plage')
            ->setHoraires('9h a 9h50')
            ->setPrix(strtoupper(15.99));


        $transat = new Transat();
        $transat->setNumTransat('22')
            ->setPosition('2/4')
            ->setType('double');

        $manager->persist($reservation);
        $manager->persist($transat);
        $manager->persist($hanakhin);
        try{
            $manager->flush();
        }catch(MongoDBException $e){
        }
    }
}
