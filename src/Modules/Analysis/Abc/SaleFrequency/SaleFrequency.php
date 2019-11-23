<?php declare(strict_types=1);


namespace App\Modules\Analysis\Abc\SaleFrequency;


class SaleFrequency
{
    /** @var \App\Modules\Analysis\Abc\SaleFrequency\SaleFrequencyDtoCollectionFactory */
    private $saleFrequencyDtoCollectionFactory;

    /**
     * SaleFrequency constructor.
     *
     * @param \App\Modules\Analysis\Abc\SaleFrequency\SaleFrequencyDtoCollectionFactory $saleFrequencyDtoCollectionFactory
     */
    public function __construct(\App\Modules\Analysis\Abc\SaleFrequency\SaleFrequencyDtoCollectionFactory $saleFrequencyDtoCollectionFactory)
    {
        $this->saleFrequencyDtoCollectionFactory = $saleFrequencyDtoCollectionFactory;
    }

    public function computeByArray(array $data): SaleFrequencyDtoCollection
    {
       $saleFrequencyDtoCollection = $this->saleFrequencyDtoCollectionFactory->createSaleFrequencyDtoCollectionFromArray($data);
       $saleFrequencyDtoCollection->setPercenteRangeForAbcSegment('A',0.20,1.00);
       $saleFrequencyDtoCollection->setPercenteRangeForAbcSegment('B',0.10,0.20);
       $saleFrequencyDtoCollection->setPercenteRangeForAbcSegment('C',0.05,0.10);
       $saleFrequencyDtoCollection->setPercenteRangeForAbcSegment('D',0.00,0.05);
       return $saleFrequencyDtoCollection;
    }


}