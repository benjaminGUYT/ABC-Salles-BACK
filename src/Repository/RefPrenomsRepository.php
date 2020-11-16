<?php

namespace App\Repository;

use App\Entity\exercices\RefPrenoms;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RefPers[]    findAll()
 */
class RefPrenomsRepository extends ServiceEntityRepository {
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RefPrenoms::class);
    }

}