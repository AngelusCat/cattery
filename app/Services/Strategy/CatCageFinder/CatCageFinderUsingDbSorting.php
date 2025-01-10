<?php

namespace App\Services\Strategy\CatCageFinder;

use App\Entities\Cage;
use App\Entities\Cat;
use App\Interfaces\CatCageFinder;

class CatCageFinderUsingDbSorting implements CatCageFinder
{
    public function find(Cat $cat): Cage
    {
        // TODO: Implement find() method.
    }
}
