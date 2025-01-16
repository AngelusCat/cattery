<?php

namespace App\Repositories;

use App\Entities\Cat;
use Doctrine\ORM\EntityRepository;

class CageRepository extends EntityRepository
{
    /*
    SELECT * FROM cages WHERE id NOT IN (SELECT cage_id FROM cats) ORDER BY FIELD(cage_type, 'single', 'average', 'spacious');
     */
    public function getEmptyCagesSortedByType()
    {
//        return $this->createQueryBuilder('c')
//            ->where('c.id NOT IN (SELECT cat.cage_id FROM App\Entity\Cat cat)')
//            ->orderBy('FIELD(c.cage_type, \'single\', \'average\', \'spacious\')')
//            ->getQuery()
//            ->getResult();

        $subQuery = $this->createQueryBuilder('ca')
            ->select('ca.cage_id')
            ->from('App\Entities\Cat', 'ca');

        return $this->createQueryBuilder('c')
            ->select('c')
            ->from('App\Entities\Cage', 'c')
            ->where('c.id NOT IN (' . $subQuery->getDQL() . ')')
            ->orderBy('FIELD(c.cage_type, \'single\', \'average\', \'spacious\')')
            ->getQuery()
            ->getResult();
    }

    public function getCagesWithoutSickAndAggressiveCats()
    {
        $subQuery = $this->createQueryBuilder('ca')
            ->select('ca.cage_id')
            ->from('App\Entities\Cat', 'ca')
            ->where('ca.is_sick = false')
            ->andWhere('ca.is_aggressive = false');

        return $this->createQueryBuilder('c')
            ->select('c')
            ->from('App\Entities\Cage', 'c')
            ->where('c.id IN (' . $subQuery->getDQL() . ')')
            ->getQuery()
            ->getResult();
    }
}
