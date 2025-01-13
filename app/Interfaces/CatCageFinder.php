<?php

namespace App\Interfaces;

use App\Entities\Cage;
use App\Entities\Cat;

/**
 * Интерфейс для алгоритма, который ищет подходящую клетку для кошки
 */

interface CatCageFinder
{
    public function find(Cat $cat): Cage;
}
