<?php

namespace App\Entities;

use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\OneToOne;
use Doctrine\ORM\Mapping\Table;

#[Entity]
#[Table(name: 'medical_cards')]
class MedicalCard
{
    #[OneToOne(targetEntity: Cat::class, inversedBy: "medicalCard")]
    #[JoinColumn(name: "cat_id", referencedColumnName: "id")]
    private Cat $cat;
}
