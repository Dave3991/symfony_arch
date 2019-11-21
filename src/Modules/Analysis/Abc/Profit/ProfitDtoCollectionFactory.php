<?php declare(strict_types=1);


namespace App\Modules\Analysis\Abc\Profit;


class ProfitDtoCollectionFactory
{
    public function createProfitDtoCollection(): ProfitDtoCollection
    {
        return new ProfitDtoCollection();
    }

    public function createProfitDtoCollectionFromArray(array $data): ProfitDtoCollection
    {
        $profitDtoCollection = $this->createProfitDtoCollection();
        foreach ($data as $key => $profitValue)
        {
            $profitDto = new ProfitDto($key,$profitValue);
            $profitDtoCollection->add($profitDto);
        }
        $profitDtoCollection->sortByProfitValue();
        return $profitDtoCollection;
    }

    public function createProfitDtoCollectionFromDb(): ProfitDtoCollection
    {
        /**
         * @todo load data from database
         */
        return $this->createProfitDtoCollection();
    }


}