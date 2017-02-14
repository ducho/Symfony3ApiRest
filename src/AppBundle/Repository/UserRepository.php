<?php

namespace AppBundle\Repository;

use AppBundle\Entity\User;
use AppBundle\Pagination\PaginatedCollection;
use Doctrine\ORM\EntityRepository;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use Pagerfanta\Pagerfanta;

class UserRepository extends EntityRepository
{
    public function findAllQueryBuilder($page)
    {
		$user =  $this->createQueryBuilder('user');

   		$adapter = new DoctrineORMAdapter($user);
        $pagerfanta = new Pagerfanta($adapter, false);
        $pagerfanta->setMaxPerPage(10);
        $pagerfanta->setCurrentPage($page);

		$users = [];
        foreach ($pagerfanta->getCurrentPageResults() as $result) {
            $users[] = $result;
        }

        $paginatedCollection = new PaginatedCollection($users, $pagerfanta->getNbResults());

        return $paginatedCollection;
    }
}
