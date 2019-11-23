<?php declare(strict_types=1);


namespace App\Modules\Analysis\Abc\Profit;


use App\Modules\Analysis\Abc\IDtoCollection;

final class ProfitDtoCollection extends \Doctrine\Common\Collections\ArrayCollection implements IDtoCollection
{
    /** @param \App\Modules\Analysis\Abc\Profit\ProfitDto */
    public function add($element)
    {
        parent::add($element);
    }

    public function sortByProfitValue(): ProfitDtoCollection
    {
        $iterator = $this->getIterator();
        $iterator->uasort(function ($a, $b) {
            /** @var \App\Modules\Analysis\Abc\Profit\ProfitDto  $a */
            /** @var \App\Modules\Analysis\Abc\Profit\ProfitDto $b */
            return ($a->getProfitValue() < $b->getProfitValue()) ? -1 : 1;
        });
        $sortedProfitDtoCollection = new static(\iterator_to_array($iterator));
        $rankedProfitDtoCollection = $this->setRankToProfitDto($sortedProfitDtoCollection);
        return $rankedProfitDtoCollection;
    }

    private function setRankToProfitDto(ProfitDtoCollection $profitDtoCollection): ProfitDtoCollection
    {
        $rankedProfitDtoCollection = new self();
        $rank = 0;
        /** @var \App\Modules\Analysis\Abc\Profit\ProfitDto $profitDto */
        foreach ($profitDtoCollection as $profitDto)
        {
            $profitDto->setRank($rank++);
            $rankedProfitDtoCollection->add($profitDto);
        }
        return $rankedProfitDtoCollection;
    }

    public function setPercenteRangeForAbcSegment(string $abcSegment, float $percentFrom, float $percentTo): ProfitDtoCollection
    {
        $rangedProfitDtoCollecton = new self();
        $elementCount = $this->count();
        $profitValueSum = 0;
        /** @var \App\Modules\Analysis\Abc\Profit\ProfitDto $profitDto */
        foreach ($this as $profitDto)
        {
            $profitValueSum += $profitDto->getProfitValue();
        }

        foreach ($this as $profitDto)
        {
            $profitValuePercent = $profitDto->getProfitValue()/$profitValueSum;
            if($percentFrom < $profitValuePercent && $profitValuePercent <= $percentTo)
            {
                $profitDto->setAbcSegment($abcSegment);
                $profitDto->setValueRank($profitValuePercent);
            }
        }
        return $rangedProfitDtoCollecton;
    }

}