<?php

namespace App\Entities;

use Doctrine\ORM\Mapping\Entity;

use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\Table;
use Illuminate\Support\Collection;

#[Entity]
#[Table(name: 'cages')]
class Cage
{
    #[OneToMany(targetEntity: Cat::class)]
    private Collection $cats;
}
