<?php

namespace App\Services\Strategy\CatCageFinder;

use App\Entities\Cage;
use App\Entities\Cat;
use App\Interfaces\CatCageFinder;

/**
 * На основе состояния кошки определяются критерии фильтрации и сортировки, выполняется SQL-запрос, по данным которого создается определенная Cage
 * Класс критериев инкапсулирует в себе SQL-запрос
 */

class CatCageFinderUsingDbSorting implements CatCageFinder
{
    public function find(Cat $cat): Cage
    {
        // TODO: Implement find() method.
    }
}
