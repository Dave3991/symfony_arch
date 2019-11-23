<?php declare(strict_types=1);


namespace App\Modules\Analysis\Abc\Combination;


class CombinationDto implements \JsonSerializable
{
    /** @var \App\Modules\Analysis\Abc\IAbcDto */
    private $dtoA;
    /** @var \App\Modules\Analysis\Abc\IAbcDto */
    private $dtoB;
    /** @var float */
    private $rankValue;

    /**
     * CombinationDto constructor.
     *
     * @param \App\Modules\Analysis\Abc\IAbcDto $dtoA
     * @param \App\Modules\Analysis\Abc\IAbcDto $dtoB
     */
    public function __construct(\App\Modules\Analysis\Abc\IAbcDto $dtoA, \App\Modules\Analysis\Abc\IAbcDto $dtoB)
    {
        $this->dtoA = $dtoA;
        $this->dtoB = $dtoB;
    }

    /**
     * @return \App\Modules\Analysis\Abc\IAbcDto
     */
    public function getDtoA(): \App\Modules\Analysis\Abc\IAbcDto
    {
        return $this->dtoA;
    }

    /**
     * @return \App\Modules\Analysis\Abc\IAbcDto
     */
    public function getDtoB(): \App\Modules\Analysis\Abc\IAbcDto
    {
        return $this->dtoB;
    }

    /**
     * @return float
     */
    public function getRankValue(): float
    {
        return $this->rankValue;
    }

    /**
     * @param float $rankValue
     */
    public function setRankValue(float $rankValue): void
    {
        $this->rankValue = $rankValue;
    }

    public function jsonSerialize(): array
    {
        return \get_object_vars($this);
    }


}