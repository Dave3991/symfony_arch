<?php declare(strict_types=1);


namespace App\Modules\Analysis\Abc\Profit;


use App\Modules\Analysis\Abc\IAbcDto;

final class ProfitDto implements \JsonSerializable, IAbcDto
{
    /** @var int */
    private $rank;

    /** @var string
     * whatever identification for SKU
     */
    private $skuId;

    /**
     * @var float
     */
    private $profitValue;

    /**
     * @var string
     */
    private $abcSegment;

    /**
     * kolik % z celku má tato polozka na svedomi
     * @var float
     */
    private $valueRank;

    public function __construct(string $skuId, float $profitValue)
    {
        $this->skuId = $skuId;
        $this->profitValue = $profitValue;
    }

    public function setRank(int $rank)
    {
        $this->rank = $rank;
    }

    /**
     * @return int
     */
    public function getRank(): int
    {
        return $this->rank;
    }

    /**
     * @return string
     */
    public function getSkuId(): string
    {
        return $this->skuId;
    }

    /**
     * @return float
     */
    public function getProfitValue(): float
    {
        return $this->profitValue;
    }

    /**
     * @return string
     */
    public function getAbcSegment(): string
    {
        return $this->abcSegment;
    }

    /**
     * @param string $abcSegment
     */
    public function setAbcSegment(string $abcSegment): void
    {
        $this->abcSegment = $abcSegment;
    }

    public function setValueRank(float $valueRank): void
    {
        $this->valueRank = $valueRank;
    }

    public function getValueRank(): float
    {
        return $this->valueRank;
    }


    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }


}