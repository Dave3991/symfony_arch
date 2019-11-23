<?php declare(strict_types=1);


namespace App\Modules\Analysis\Abc\Combination;


use App\Modules\Analysis\Abc\IDtoCollection;

final class CombinationDtoCollectionFactory
{
    public function create(IDtoCollection $collectionA, IDtoCollection $collectionB): CombinationDtoCollection
    {
        $combinationDtoCollection = new CombinationDtoCollection();
        $elementArrayA = [];
        /** @var \App\Modules\Analysis\Abc\IAbcDto $elementA */
        foreach ($collectionA as $elementA)
        {
            $elementArrayA[$elementA->getSkuId()] = $elementA;
        }
        /** @var \App\Modules\Analysis\Abc\IAbcDto $elementB */
        foreach ($collectionB as $elementB)
        {
            $skuId = $elementB->getSkuId();
            $elementA = $elementArrayA[$skuId];
            if($elementA === null)
            {
                \Tracy\Debugger::log("Missing {$skuId} in " . \get_class($collectionA) ." {$skuId} will not be in ABC_XYZ analysis for " . \get_class($collectionA) . " AND " . \get_class($collectionB), \Tracy\Debugger::WARNING);
                continue;
            }
            $combinationDto = new CombinationDto($elementA,$elementB);
            $combinationDtoCollection->add($combinationDto);
        }
        $combinationDtoCollection->computeCombinedRankValue();

        return $combinationDtoCollection;
    }
}