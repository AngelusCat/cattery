<?php

namespace App\Entities;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Cache;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\OneToOne;
use Doctrine\ORM\Mapping\Table;

#[Entity]
#[Table(name: 'cats')]
class Cat
{
    #[Id]
    #[GeneratedValue]
    #[Column(type: Types::INTEGER)]
    private int $id;

    #[Column(length: 64)]
    private string $name;

    #[Column(length: 64)]
    private string $breed;

    #[Column(type: Types::SMALLINT, options: ['unsigned' => true])]
    private int $age;

    #[Column(name: 'is_adopted', type: Types::BOOLEAN)]
    private bool $isAdopted;

    #[OneToOne(targetEntity: MedicalCard::class, inversedBy: 'cat', cascade: ['persist', 'remove'])]
    #[JoinColumn(name: 'medical_card_id', referencedColumnName: 'id')]
    private MedicalCard $medicalCard;
}
