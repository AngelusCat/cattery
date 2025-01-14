<?php

namespace App\CatState;

use App\Entities\Cage;
use App\Interfaces\CatState;

class TooActiveCatState implements CatState
{
    public function findCage(): Cage
    {
        // TODO: Implement findCage() method.
    }
}
