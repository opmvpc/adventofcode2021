<?php

namespace Opmvpc\Aoc2021\Benchmark;

use JetBrains\PhpStorm\ArrayShape;

class BenchResult
{
    private float $parsingTime;

    private float $solvingTime;

    public function __construct(
        private int $day,
        private int $exercise)
    {
        $this->parsingTime = 0;
        $this->solvingTime = 0;
    }

    /**
     * @return float
     */
    public function getParsingTime(): float
    {
        return $this->parsingTime;
    }

    /**
     * @param float $parsingTime
     */
    public function setParsingTime(float $parsingTime): void
    {
        $this->parsingTime = $parsingTime;
    }

    /**
     * @return float
     */
    public function getSolvingTime(): float
    {
        return $this->solvingTime;
    }

    /**
     * @param float $solvingTime
     */
    public function setSolvingTime(float $solvingTime): void
    {
        $this->solvingTime = $solvingTime;
    }

    /**
     * @return int
     */
    public function getDay(): int
    {
        return $this->day;
    }

    /**
     * @return int
     */
    public function getExercise(): int
    {
        return $this->exercise;
    }

    public function toArray(): array
    {
        return [
            'day' => $this->day,
            'exercise' => $this->exercise,
            'parsingTime' => $this->parsingTime,
            'solvingTime' => $this->solvingTime,
        ];
    }
}
