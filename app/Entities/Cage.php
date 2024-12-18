<?php

namespace App\Entities;

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
    #[OneToMany(targetEntity: Cat::class)]
    private Collection $cats;
    private CageCapacity $capacity;
    public function addCat(Cat $cat): void
    {
        $this->cats->add($cat);
    }
    public function removeCat(): void
    {
        //
    }

    public function isEmpty(): bool
    {
        //
    }

    public function containsOnlyCatsOfTheSameGender(Gender $gender): bool
    {
        //
    }

    public function allCatsOfOppositeGenderInCageAreSterilized(Gender $gender): bool
    {
        //
    }

    public function containsOverlyActiveCats(): bool
    {
        //
    }
}
