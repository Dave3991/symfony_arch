<?php declare(strict_types=1);


namespace App\Modules\Analysis\Abc\SaleFrequency;


use App\Modules\Analysis\Abc\IDtoCollection;

final class SaleFrequencyDtoCollection extends \Doctrine\Common\Collections\ArrayCollection implements IDtoCollection
{

    /** @param \App\Modules\Analysis\Abc\SaleFrequency\SaleFrequencyDto */
    public function add($element)
    {
        parent::add($element);
    }

    public function sortByProfitValue(): SaleFrequencyDtoCollection
    {
        $iterator = $this->getIterator();
        $iterator->uasort(function ($a, $b) {
            /** @var \App\Modules\Analysis\Abc\SaleFrequency\SaleFrequencyDto  $a */
            /** @var \App\Modules\Analysis\Abc\SaleFrequency\SaleFrequencyDto  $b */
            return ($a->getSaleFrequencyValue() < $b->getSaleFrequencyValue()) ? -1 : 1;
        });
        $sortedProfitDtoCollection = new static(\iterator_to_array($iterator));
        $rankedProfitDtoCollection = $this->setSaleFrequencyValueRank($sortedProfitDtoCollection);
        return $rankedProfitDtoCollection;
    }

    private function setSaleFrequencyValueRank(SaleFrequencyDtoCollection $saleFrequencyDtoCollection): SaleFrequencyDtoCollection
    {
        $saleFrequencySum = 0;
        /** @var \App\Modules\Analysis\Abc\SaleFrequency\SaleFrequencyDto $saleFrequencyDto */
        foreach ($saleFrequencyDtoCollection as $saleFrequencyDto)
        {
            $saleFrequencySum += $saleFrequencyDto->getSaleFrequencyValue();
        }

        foreach ($saleFrequencyDtoCollection as $saleFrequencyDto)
        {
            $saleFrequencyValuePercent = $saleFrequencyDto->getSaleFrequencyValue()/$saleFrequencySum;
            $saleFrequencyDto->setValueRank($saleFrequencyValuePercent);
        }
        return $saleFrequencyDtoCollection;
    }

    public function setPercenteRangeForAbcSegment(string $abcSegment, float $percentFrom, float $percentTo): SaleFrequencyDtoCollection
    {
        $rangedProfitDtoCollecton = new self();
        $saleFrequencySum = 0;
        /** @var \App\Modules\Analysis\Abc\SaleFrequency\SaleFrequencyDto $saleFrequencyDto */
        foreach ($this as $saleFrequencyDto)
        {
            $saleFrequencySum += $saleFrequencyDto->getSaleFrequencyValue();
        }

        foreach ($this as $saleFrequencyDto)
        {
            $profitValuePercent = $saleFrequencyDto->getSaleFrequencyValue()/$saleFrequencySum;
            if($percentFrom < $profitValuePercent && $profitValuePercent <= $percentTo)
            {
                $saleFrequencyDto->setAbcSegment($abcSegment);
            }
        }
        return $rangedProfitDtoCollecton;
    }
}