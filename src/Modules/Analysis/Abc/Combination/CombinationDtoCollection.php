<?php declare(strict_types=1);


namespace App\Modules\Analysis\Abc\Combination;


class CombinationDtoCollection extends \Doctrine\Common\Collections\ArrayCollection
{
    /** @param \App\Modules\Analysis\Abc\Combination\CombinationDto */
    public function add($element): bool
    {
       return parent::add($element);
    }

    public function computeCombinedRankValue(): CombinationDtoCollection
    {
        /** @var \App\Modules\Analysis\Abc\Combination\CombinationDto $combinationDto */
        foreach ($this as $combinationDto)
        {
            $valueRankA = $combinationDto->getDtoA()->getValueRank();
            $valueRankB = $combinationDto->getDtoB()->getValueRank();
            $combinedValueRank = \sqrt(($valueRankA**2 + $valueRankB**2));
            $combinationDto->setRankValue($combinedValueRank);
        }
        return $this;
    }
}