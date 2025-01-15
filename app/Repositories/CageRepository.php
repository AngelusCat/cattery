<?php

namespace App\Repositories;

use Doctrine\ORM\EntityRepository;

class CageRepository extends EntityRepository
{
    /*
    SELECT * FROM cages WHERE id NOT IN (SELECT cage_id FROM cats) ORDER BY FIELD(cage_type, 'single', 'average', 'spacious');
     */
    public function getEmptyCagesSortedByType()
    {
        return $this->createQueryBuilder('c')
            ->where('c.id NOT IN (SELECT cat.cage_id FROM App\Entity\Cat cat)')
            ->orderBy('FIELD(c.cageType, \'single\', \'average\', \'spacious\')')
            ->getQuery()
            ->getResult();
    }
}
