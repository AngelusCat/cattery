<?php

namespace App\Services\Flyweight;

use App\Enums\CageType;
use App\ValueObjects\CageCapacity;
use Illuminate\Support\Collection;
use InvalidArgumentException;

class CageCapacityFlyweight
{
    private Collection $cageCapacities;

    public function __construct()
    {
        $this->cageCapacities = new Collection();
    }

    public function getCageCapacity(CageType $cageType): CageCapacity
    {
        $necessaryCageCapacity = $this->cageCapacities->first(function (CageCapacity $cageCapacity) use ($cageType) {
            return $cageCapacity->getCageType() === $cageType;
        });

        if (!$necessaryCageCapacity) {
            $necessaryCageCapacity = match ($cageType) {
                CageType::single => new CageCapacity(CageType::single, 1, 0),
                CageType::average => new CageCapacity(CageType::average, 2, 1),
                CageType::spacious => new CageCapacity(CageType::spacious, 4, 2),
                default => throw new InvalidArgumentException("Unknown cage type: $cageType->name")
            };
            $this->cageCapacities->push($necessaryCageCapacity);
            return $necessaryCageCapacity;
        }

        return $necessaryCageCapacity;
    }
}
