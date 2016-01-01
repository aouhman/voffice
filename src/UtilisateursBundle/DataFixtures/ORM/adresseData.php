<?php


namespace Utilisateurs\UtilisateursBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use proptical\propticalBundle\Entity\UtilisateursAdresses;

class adresseData extends AbstractFixture implements OrderedFixtureInterface
{

public function load(ObjectManager $manager)
{

    $adresse1= new UtilisateursAdresses();
    $adresse1->setNom('Catel');
    $adresse1->setUtilisateur($this->getReference('user'));
    $adresse1->setPrenom("benjamin")   ;
    $adresse1->setComplement("face")  ;
    $adresse1->setAdresse("ssssss")  ;
    $adresse1->setCp("76600");
    $adresse1->setPays("MAroc")   ;
    $adresse1->setTelephon("060000000")   ;
    $adresse1->setVille("casa") ;
    $manager->persist($adresse1);
    $manager->flush();


}

    public function getOrder(){
        return 6;
    }
}