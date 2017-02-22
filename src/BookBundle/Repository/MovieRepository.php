<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class MovieRepository extends EntityRepository
{
    /**
     * @return Movie[]
     */
    public function findAllMoviesOrderedByPublicationDate()
    {
        return $this->createQueryBuilder('movie')
            ->orderBy('movie.publicationDate', 'DESC')
            ->getQuery()
            ->execute();
    }
}
