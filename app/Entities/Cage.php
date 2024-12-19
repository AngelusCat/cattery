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
    //private CageCapacity $capacity;

    /**
     *добавить всех непосредственных соседей в очередь
     * извлечь первого непосредственного соседа
     * проверить его на условие
     * условие выполнено => готово
     * условие невыполнено => добавить соседей этого узла в конец очереди
     *
     * очередь пуста => нет подходящих клеток
     *
     * т.к. граф может иметь циклические ссылки, нужно проверять, проверялся ли узел раньше
     *
     * женская
     * мужская
     *
     * стерилизованный
     * нестерилизованный
     *
     * больной
     * здоровый
     *
     * агрессивный
     * спокойный
     *
     * активный
     * спокойный
     *
     * кошка может быть в клетке с котами, если они стерилизованы или если она стерилизована => зависит от пола и стерилизации других кошек
     *
     * т.е. одна из сторон должна быть стерилизована
     *
     * кошка больна => живет одна => только свободная клетка => предпочтительно одиночная
     *
     * кошка агрессивна => живет одна => только свободная клетка => предпочтительно одиночная
     *
     * кошка активна => живет в определенных клетках => только средняя и просторная клетки
     *
     * спокойная => простой случай => живет где угодно
     */

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
