<?php

namespace App\CatState;

use App\Entities\Cage;
use App\Interfaces\CatState;

class AggressiveCatState extends CatState
{
    public function findCages(): array
    {
        return $this->cageRepository->getEmptyCagesSortedByType();
    }
}
