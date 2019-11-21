<?php declare(strict_types=1);


namespace App\Modules\Analysis\Abc;


use App\Modules\Analysis\Abc\Profit\Profit;

class AbcServiceProvider
{
    /** @var \App\Modules\Analysis\Abc\Profit\Profit  */
    private $profit;

    public function __construct(Profit $profit)
    {
        $this->profit = $profit;
    }

    public function computeProfitFromArray(array $array): array
    {
        return $this->profit->computeByArray($array)->toArray();
    }

}