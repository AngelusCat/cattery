<?php

namespace App\Interfaces;

use App\Entities\Cage;
use App\Entities\Cat;

interface CatCageFinder
{
    public function find(Cat $cat): Cage;
}
