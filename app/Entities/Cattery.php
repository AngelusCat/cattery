<?php

namespace App\Entities;

use Illuminate\Support\Collection;

class Cattery
{
    private Collection $cages;
    public function placeCatInCattery(Cat $cat): bool
    {
        if ($cat->isSick() || $cat->isAggressive()) {
            /**/
        }
    }

/*    private function getSuitableSingleFreeCage(): ?Cage
    {
        $freeSingleCages = $this->getFreeSingleCages();
        if ($freeSingleCages->isEmpty()) {
            return null;
        }
        return $freeSingleCages->random();
    }*/

    private function releaseSingleCage(): bool
    {
        //
    }

    private function getSuitableAverageFreeCage(): Cage
    {
        //
    }

    private function getSuitableSpaciousFreeCage(): Cage
    {
        //
    }

    private function getFreeSingleCages(): Collection
    {
        //
    }

    private function getOccupiedSingleCagesWithoutSickAndAggressiveCats(): Collection
    {
        //
    }

    private function getFreeOrSemiFreeAverageCages(): Collection
    {
        //
    }

    private function getFreeOrSemiFreeSpaciousCages(): Collection
    {
        //
    }
}
