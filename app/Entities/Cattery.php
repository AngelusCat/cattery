<?php

namespace App\Entities;

use Illuminate\Support\Collection;

class Cattery
{
    private Collection $cages;
    public function placeCatInCattery(Cat $cat): bool
    {
        if ($this->areAllCagesOccupied()) {
            return false;
        }

        $singleCages = $this->getSingleCages();
        $averageCages = $this->getAverageCages();
        $spaciousCages = $this->getSpaciousCages();

        if ($cat->isSick() || $cat->isAggressive()) {
            if ($singleCages) {
                //получить любую клетку
                //$cage->addCat($cat);
                return true;
            }
        }

        if ($cat->isTooActive()) {
            if ($averageCages) {
                //получить только полностью свободные average
                //свободных нет
//                if (свободные есть) {
//                    получить любую
//                    $cage->addCat($cat);
//                    return true;
//                }
            }

            if ($spaciousCages) {
                //получить только те, в которых есть место (активная кошка занимает 2 места, всего 4)
//                if (свободных нет) {
//                    return false;
//                }
            }
        }






        /**
         * есть ли свободные и полусвободные клетки?
         * да -> продолжить
         * нет -> завершить алгоритм
         *
         * да:
         * кошка неагрессивная и здоровая?
         * да
         * кошка активная?
         * да
         * получить средние и просторные клетки
         * кошка подходит по полу и стерилизации?
         * да
         * поместить
         * нет
         * выбрать другие клетки из набора
         *
         * кошка активная?
         * нет
         * получить все клетки
         * кошка подходит по полу?
         * ...
         *
         * кошка агрессивная или больная?
         * да
         * получить одиночные клетки
         * одиночные клетки есть
         * поместить
         *
         * одиночных клеток нет
         * получить одиночные клетки с спокойными неагрессивными и здоровыми кошками
         * переместить такую кошку в средннюю или просторную клетку
         * поместить агрессивную или больную кошку в одиночную клетку
         *
         * не удалось переместить спокойную кошку
         * нельзя поместить кошку
         */
    }
    private function areAllCagesOccupied(): bool
    {
        //все клетки заняты
    }

    private function getSingleCages(): ?Collection
    {
        //возвращает одиночные клетки
    }

    private function getAverageCages(): ?Collection
    {
        //возвращает средние клетки
    }

    private function getSpaciousCages(): ?Collection
    {
        //возвращает просторные клетки
    }
}
