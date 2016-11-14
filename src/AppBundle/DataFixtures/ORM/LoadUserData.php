<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\User;

class LoadUserData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        for ($i=0;$i<20;$i++) {
			$user = new User();
            $user->setName('test test');
			$user->setSurname('test test');

			$manager->persist($user);
		}

      	$manager->flush();
    }

    public function getOrder()
    {
        return 1;
    }
}
