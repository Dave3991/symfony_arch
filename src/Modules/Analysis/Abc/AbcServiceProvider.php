<?php declare(strict_types=1);


namespace App\Modules\Analysis\Abc;


use App\Modules\Analysis\Abc\Combination\CombinationDtoCollection;
use App\Modules\Analysis\Abc\Combination\CombinationDtoCollectionFactory;
use App\Modules\Analysis\Abc\Profit\Profit;
use App\Modules\Analysis\Abc\SaleFrequency\SaleFrequency;

class AbcServiceProvider
{
    /** @var \App\Modules\Analysis\Abc\Profit\Profit  */
    private $profit;
    /** @var \App\Modules\Analysis\Abc\SaleFrequency\SaleFrequency  */
    private $saleFrequency;
    /** @var \App\Modules\Analysis\Abc\Combination\CombinationDtoCollectionFactory  */
    private $combinationDtoCollectionFactory;

    public function __construct(
        Profit $profit,
        SaleFrequency $saleFrequency,
        CombinationDtoCollectionFactory $combinationDtoCollectionFactory
    )
    {
        $this->profit = $profit;
        $this->saleFrequency = $saleFrequency;
        $this->combinationDtoCollectionFactory = $combinationDtoCollectionFactory;
    }

    public function computeProfitFromArray(array $data): array
    {
        return $this->profit->computeByArray($data)->toArray();
    }

    public function computeSaleFrequencyFromArray(array $data): array
    {
        return $this->saleFrequency->computeByArray($data)->toArray();
    }

    public function computeCombinationProfitSaleFrequency(array $profitData, array $saleFrequencyData): array
    {
        $profitDtoCollection = $this->profit->computeByArray($profitData);
        $saleFrequencyDtoCollection = $this->saleFrequency->computeByArray($saleFrequencyData);
        $combinationCollection = $this->combinationDtoCollectionFactory->create($profitDtoCollection,$saleFrequencyDtoCollection);
        return $combinationCollection->toArray();
    }

}