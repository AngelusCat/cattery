<?php

namespace App\Entities;

use App\Enums\Gender;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
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

    #[Column(type: Types::STRING)]
    private Gender $gender;

    #[Column(name: 'is_adopted', type: Types::BOOLEAN)]
    private bool $isAdopted;

    #[Column(name: 'is_sterilized', type: Types::BOOLEAN)]
    private bool $isSterilized;

    #[Column(name: 'is_sick', type: Types::BOOLEAN)]
    private bool $isSick;

    #[Column(name: 'is_aggressive', type: Types::BOOLEAN)]
    private bool $isAggressive;

    #[Column(name: 'is_too_active', type: Types::BOOLEAN)]
    private bool $isTooActive;

    #[OneToOne(targetEntity: MedicalCard::class, inversedBy: 'cat', cascade: ['persist', 'remove'])]
    #[JoinColumn(name: 'medical_card_id', referencedColumnName: 'id')]
    private MedicalCard $medicalCard;

    #[ManyToOne(targetEntity: Cage::class)]
    #[JoinColumn(name: 'cage_id', referencedColumnName: 'id')]
    private Cage $cage;
    public function isAdopted(): bool
    {
        return $this->isAdopted;
    }

    public function isSterilized(): bool
    {
        return $this->isSterilized;
    }

    public function isSick(): bool
    {
        return $this->isSick;
    }

    public function isAggressive(): bool
    {
        return $this->isAggressive;
    }

    public function isTooActive(): bool
    {
        return $this->isTooActive;
    }
}
