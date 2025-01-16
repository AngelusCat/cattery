<?php

namespace App\Services\Strategy\CatCageFinder;

use App\CatState\AggressiveCatState;
use App\CatState\SickCatState;
use App\CatState\TooActiveCatState;
use App\Entities\Cage;
use App\Entities\Cat;
use App\Interfaces\CatCageFinder;
use App\Interfaces\CatState;

/**
 * На основе состояния кошки определяются критерии фильтрации и сортировки, выполняется SQL-запрос, по данным которого создается определенная Cage
 * Класс критериев инкапсулирует в себе SQL-запрос
 */

class CatCageFinderUsingDb implements CatCageFinder
{
    public function find(Cat $cat): Cage
    {
        //создать CatState на основе $cat
        //$catState->findCages(); //вызовет метод репозитория и вернет Cage
        //проверяем на половую совместимость
        //возвращаем клетку
        $catState = $this->createCatState($cat);
        $cages = $catState->findCages();

        $cage = $cages[array_rand($cages)];

        if (!$cat->isSterilized() && !$catState instanceof SickCatState && !$catState instanceof AggressiveCatState) {
            $cage = $this->getFirstCageThatPassesTestForSexualCompatibility($cages);
        }

        //выбрать рандомную клетку из cages

        return $cage;
    }

    private function createCatState(Cat $cat): CatState
    {
        if ($cat->isSick()) {
            return new SickCatState();
        }

        if ($cat->isAggressive()) {
            return new AggressiveCatState();
        }

        if ($cat->isTooActive()) {
            return new TooActiveCatState();
        }
    }

    private function getFirstCageThatPassesTestForSexualCompatibility(array $cages): Cage
    {
        //
    }
}
