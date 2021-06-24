<?php

namespace App\DataFixtures;

use App\Entity\Annonce;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{

        public function load(ObjectManager $manager)
    {
        // create 20 products! Bam!
        for ($i = 0; $i < 20; $i++) {
            $annonce = new Annonce();
            $annonce->setTitre('Annonce'.$i);
            $annonce->setEmail("mounir-$i-lePlusBeau@gmail.com");
            $annonce->setLieu("Bordeaux 3300$i");
            $annonce->setDescription("Bonjour a tous, je suis mounir, 
            les gens pensent que je joue au foot aussi bien que Zizou 
            malheureusement quand je secoue ma cheville je me fais une entorse");
            $manager->persist($annonce);
        }

        $manager->flush();
    }
}
