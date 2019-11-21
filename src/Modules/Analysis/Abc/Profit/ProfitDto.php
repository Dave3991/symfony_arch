<?php declare(strict_types=1);


namespace App\Modules\Analysis\Abc\Profit;


final class ProfitDto implements \JsonSerializable
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
     * @var float
     */
    private $abcSegmentPercentFrom;

    /**
     * @var float
     */
    private $abcSegmentPercentTo;

    /**
     * kolik % z celku má tato polozka na svedomi
     * @var float
     */
    private $profitValueRank;

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
    public function setAbcSegment(string $abcSegment, float $abcSegmentPercentFrom, float $abcSegmentPercentTo): void
    {
        $this->abcSegment = $abcSegment;
        $this->abcSegmentPercentFrom = $abcSegmentPercentFrom;
        $this->abcSegmentPercentTo = $abcSegmentPercentTo;
    }

    public function setProfitValueRank(float $profitValueRank): void
    {
        $this->profitValueRank = $profitValueRank;
    }

    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }


}