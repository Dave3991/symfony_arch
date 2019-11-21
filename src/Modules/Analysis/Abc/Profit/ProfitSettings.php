<?php declare(strict_types=1);


namespace App\Modules\Analysis\Abc\Profit;


class ProfitSettings
{
    /**
     * 20% of product makes 80% of profit;
     * @return float
     */
    public function getA(): float
    {
        return 20.0;
    }

    public function getB(): float
    {
        return 40.0;
    }

    public function getC(): float
    {
        return 60.0;
    }

    public function getD(): float
    {
        return 80.0;
    }
}