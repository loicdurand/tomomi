<?php

namespace App\DataFixtures;

use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{

    public function load(ObjectManager $manager): void
    {
        $article = new Article();
        $article
            ->setImage('boucles_rose.jpg')
            ->setTitre('De jolies boucles d\'oreilles')
            ->setContenu(AppFixtures::BOUCLES);
        $manager->persist($article);

        $article = new Article();
        $article
            ->setImage('papillons_vert.jpg')
            ->setTitre('Redonnez vie à une pièce toute triste!')
            ->setContenu(AppFixtures::PAPILLONS);
        $manager->persist($article);

        $article = new Article();
        $article
            ->setImage('chapeau.jpg')
            ->setTitre('Les origamis, ça va avec tout!')
            ->setContenu(AppFixtures::CHAPEAU);
        $manager->persist($article);

        $manager->flush();
    }

    const BOUCLES = <<<STR
    À la demande d'une de mes amies, je viens de créer les boucles d'oreille qu'elle portera lors 
    de la soirée d'anniversaire de son mari!
    Elle a choisi la couleur rose, assortie à sa tenue du jour.
    Souhaitons-lui de briller!!!
STR;

    const PAPILLONS = <<<STR
    À la demande d'une de mes amies, je viens de créer ce joli cadre destiné qui apportera un peu
    de douceur dans une chambre d'amis.
STR;

const CHAPEAU = <<<STR
    Aujourd'hui, je me suis amusée à décorer mon chapeau tout simple.
    J'ai pris un ibiscus prévu au départ pour un présentoir de boutique.
    Je l'ai simplement posé sur mon bon vieu chapeau, et... Le coup de foudre!
    Ni une, ni deux, une petite couture pour le fixer et voilà mon couvre-chef métamorphosé!
STR;
}
