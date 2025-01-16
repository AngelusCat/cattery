<?php

namespace App\CatState;

use App\Entities\Cage;
use App\Interfaces\CatState;

class TooActiveCatState extends CatState
{
    public function findCages(): array
    {
        $cages = $this->cageRepository->getCagesWithoutSickAndAggressiveCats();
    }
}
