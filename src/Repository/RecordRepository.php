<?php

namespace App\Repository;

use App\Entity\Record;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method Record[]    findAll()
 */
class RecordRepository extends ServiceEntityRepository {


    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Record::class);
    }

    public function save(Record $record) {
        $this->_em->persist($record);
        $this->_em->flush();
    }

}