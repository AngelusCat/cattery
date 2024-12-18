<?php

namespace App\Entities;

use App\Enums\Gender;
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
