<?php

namespace AppBundle\Repository;

/**
 * MedecinRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class MedecinRepository extends \Doctrine\ORM\EntityRepository
{

    public function findWithRegion (int $id) {
        return $this->createQueryBuilder('m')
            ->select('m, v, d, r')
            ->join('m.ville', 'v')
            ->join('v.departement', 'd')
            ->join('d.region', 'r')
            ->where('m.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getSingleResult();
    }

    public function findAllWithRegion () {
        return $this->createQueryBuilder('m')
            ->select('m, v, d, r')
            ->join('m.ville', 'v')
            ->join('v.departement', 'd')
            ->join('d.region', 'r')
            ->getQuery()
            ->getResult();
    }

}
