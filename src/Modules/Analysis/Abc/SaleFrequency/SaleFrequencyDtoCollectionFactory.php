<?php declare(strict_types=1);


namespace App\Modules\Analysis\Abc\SaleFrequency;


final class SaleFrequencyDtoCollectionFactory
{

    public function createSaleFrequencyDtoCollection(): SaleFrequencyDtoCollection
    {
        return new SaleFrequencyDtoCollection();
    }

    public function createSaleFrequencyDtoCollectionFromArray(array $saleFrequencyData): SaleFrequencyDtoCollection
    {
        $salesFrequencyDtoCollection = $this->createSaleFrequencyDtoCollection();
        foreach ($saleFrequencyData as $key => $saleFrequency)
        {
            $salesFrequencyDto = new SaleFrequencyDto($key,$saleFrequency);
            $salesFrequencyDtoCollection->add($salesFrequencyDto);
        }
        $salesFrequencyDtoCollection->sortByProfitValue();
        return $salesFrequencyDtoCollection;
    }

}