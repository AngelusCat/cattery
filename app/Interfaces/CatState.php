<?php

namespace App\Interfaces;

use App\Entities\Cage;

interface CatState
{
    public function findCage(): Cage;
}
