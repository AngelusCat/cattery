<?php

namespace App\Interfaces;

use App\Entities\Cage;
use App\Repositories\CageRepository;

abstract class CatState
{
    public function __construct(protected CageRepository $cageRepository){}
    abstract public function findCages(): array;
}
