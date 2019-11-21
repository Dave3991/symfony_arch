<?php declare(strict_types=1);


namespace App\Modules\Analysis\Abc\Profit;


class Profit
{
    /** @var \App\Modules\Analysis\Abc\Profit\ProfitDtoCollectionFactory  */
    private $profitDtoCollectionFactory;

    public function __construct(ProfitDtoCollectionFactory $profitDtoCollectionFactory)
    {
        $this->profitDtoCollectionFactory = $profitDtoCollectionFactory;
    }

    /**
     * @param mixed[] $array
     */
    public function computeByArray(array $array): ProfitDtoCollection
    {
        $profitDtoCollection = $this->profitDtoCollectionFactory->createProfitDtoCollectionFromArray($array);
        $profitDtoCollection->setPercenteRangeForAbcSegment('A',0.20,1.00);
        $profitDtoCollection->setPercenteRangeForAbcSegment('B',0.10,0.20);
        $profitDtoCollection->setPercenteRangeForAbcSegment('C',0.05,0.10);
        $profitDtoCollection->setPercenteRangeForAbcSegment('D',0.0,0.05);
        return $profitDtoCollection;
    }

}