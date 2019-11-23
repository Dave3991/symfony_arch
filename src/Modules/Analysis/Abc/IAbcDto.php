<?php declare(strict_types=1);


namespace App\Modules\Analysis\Abc;


interface IAbcDto
{
    public function setValueRank(float $valueRank): void;

    public function getValueRank(): float;

    public function getSkuId(): string;
}