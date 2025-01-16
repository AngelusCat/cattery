<?php

namespace App\Entities;

use App\Enums\CageType;
use App\Enums\Gender;
use App\ValueObjects\CageCapacity;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\Table;
use Illuminate\Support\Collection;

#[Entity]
#[Table(name: 'cages')]
class Cage
{
    #[Id]
    #[GeneratedValue]
    #[Column(type: Types::INTEGER)]
    private int $id;

    #[Column(name: "cage_type", type: Types::STRING)]
    private CageType $type;
    #[OneToMany(targetEntity: Cat::class)]
    private Collection $cats;

    public function addCat(Cat $cat): void
    {
        $this->cats->add($cat);
    }

    public function catCanBePlacedInCage(Cat $cat): bool
    {
        if ($cat->isSick() || $cat->isAggressive()) {
            return false;
        }

        $currentCatWeight = ($cat->isTooActive()) ? 2 : 1;
        $weightOfCatsInCage = $this->calculateWeightOfCatsInCage();
        $totalWeightForCage = ($this->type->name === 'single') ? 1 : (($this->type->name === 'average') ? 2 : (($this->type->name === 'spacious') ? 3 : 0));

        if ($totalWeightForCage - $weightOfCatsInCage === 0 || ($totalWeightForCage - $weightOfCatsInCage) - $currentCatWeight < 0) {
            return false;
        }

        return true;
    }

    private function calculateWeightOfCatsInCage(): int
    {
        $totalWeight = 0;
        $this->cats->each(function (Cat $cat) use (&$totalWeight) {
            if ($cat->isTooActive()) {
                $totalWeight += 2;
            } else {
                $totalWeight += 1;
            }
        });
        return $totalWeight;
    }

    public function getCageType(): CageType
    {
        return $this->type;
    }
}
