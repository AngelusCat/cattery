<?php

namespace App\CatState;

use App\Entities\Cage;
use App\Interfaces\CatState;

class SickCatState extends CatState
{
    public function findCages(): array
    {
        return $this->cageRepository->getEmptyCagesSortedByType();
    }
}
