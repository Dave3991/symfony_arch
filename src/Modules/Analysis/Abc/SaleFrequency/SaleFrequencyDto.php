<?php declare(strict_types=1);


namespace App\Modules\Analysis\Abc\SaleFrequency;


use App\Modules\Analysis\Abc\IAbcDto;

final class SaleFrequencyDto implements \JsonSerializable, IAbcDto
{
    /** @var string */
    private $skuId;
    /** @var float */
    private $saleFrequencyValue;

    /**
     * Kolik % z celku tvori
     * @var float
     */
    private $valueRank;

    /** @var string */
    private $abcSegment;

    /**
     * SaleFrequencyDto constructor.
     *
     * @param string $skuId
     * @param float  $saleFrequencyValue
     */
    public function __construct(string $skuId, float $saleFrequencyValue)
    {
        $this->skuId = $skuId;
        $this->saleFrequencyValue = $saleFrequencyValue;
    }

    /**
     * @return string
     */
    public function getSkuId(): string
    {
        return $this->skuId;
    }

    /**
     * @param string $skuId
     */
    public function setSkuId(string $skuId): void
    {
        $this->skuId = $skuId;
    }

    /**
     * @return float
     */
    public function getSaleFrequencyValue(): float
    {
        return $this->saleFrequencyValue;
    }

    /**
     * @param float $saleFrequencyValue
     */
    public function setSaleFrequencyValue(float $saleFrequencyValue): void
    {
        $this->saleFrequencyValue = $saleFrequencyValue;
    }

    /**
     * @return float
     */
    public function getValueRank(): float
    {
        return $this->valueRank;
    }

    public function setAbcSegment(string $abcSegment)
    {
        $this->abcSegment = $abcSegment;
    }

    /**
     * @param float $valueRank
     */
    public function setValueRank(float $valueRank): void
    {
        $this->valueRank = $valueRank;
    }

    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }


}