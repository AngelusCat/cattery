<?php

namespace App\ValueObjects;

use App\Enums\CageType;

class CageCapacity
{
    private CageType $cageType;
    private int $numberOfCalmCats;
    private int $numberOfOverlyActiveCats;

    public function __construct(CageType $cageType, int $numberOfCalmCats, int $numberOfOverlyActiveCats)
    {
        $this->cageType = $cageType;
        $this->numberOfCalmCats = $numberOfCalmCats;
        $this->numberOfOverlyActiveCats = $numberOfOverlyActiveCats;
    }
    public function getCageType(): CageType
    {
        return $this->cageType;
    }
}
