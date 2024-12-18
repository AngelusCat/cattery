<?php

namespace App\Entities;

use DateTime;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\OneToOne;
use Doctrine\ORM\Mapping\Table;

#[Entity]
#[Table(name: 'medical_cards')]
class MedicalCard
{
    #[Id]
    #[GeneratedValue]
    #[Column(type: Types::INTEGER)]
    private int $id;
    #[Column(name: 'last_visit', type: Types::DATETIME_MUTABLE)]
    private DateTime $lastVisit;
    #[Column(Types::SIMPLE_ARRAY)]
    private array $notes;
    #[OneToOne(targetEntity: Cat::class, inversedBy: "medicalCard")]
    #[JoinColumn(name: "cat_id", referencedColumnName: "id")]
    private Cat $cat;
}
