<?php

namespace Opmvpc\Aoc2021\Solvers;

use Opmvpc\Aoc2021\Parsers\ParserDay6;

class SolverDay6Part1 extends AbstractSolver
{
    protected int $days = 80;
    protected array $board;

    /**
     * @param string $path
     */
    public function __construct(
        protected string $path,
    )
    {
        $this->inputArray = ParserDay6::parse($this->path);
    }

    public function solve(): int
    {
        $fishesByDaysLeftForCurrentDay = $this->makeEmtpyDaysLeftArray();

        foreach ($this->inputArray as $fish) {
            $fishesByDaysLeftForCurrentDay[$fish] += 1;
        }

        for ($day = 0; $day < $this->days; $day++) {
            $tempNewFishes = $fishesByDaysLeftForCurrentDay[0];
            $fishesByDaysLeftForCurrentDay[0] = $fishesByDaysLeftForCurrentDay[1];
            $fishesByDaysLeftForCurrentDay[1] = $fishesByDaysLeftForCurrentDay[2];
            $fishesByDaysLeftForCurrentDay[2] = $fishesByDaysLeftForCurrentDay[3];
            $fishesByDaysLeftForCurrentDay[3] = $fishesByDaysLeftForCurrentDay[4];
            $fishesByDaysLeftForCurrentDay[4] = $fishesByDaysLeftForCurrentDay[5];
            $fishesByDaysLeftForCurrentDay[5] = $fishesByDaysLeftForCurrentDay[6];
            $fishesByDaysLeftForCurrentDay[6] = $fishesByDaysLeftForCurrentDay[7] + $tempNewFishes;
            $fishesByDaysLeftForCurrentDay[7] = $fishesByDaysLeftForCurrentDay[8];
            $fishesByDaysLeftForCurrentDay[8] = $tempNewFishes;
        }

        return array_sum($fishesByDaysLeftForCurrentDay);
    }

    private function makeEmtpyDaysLeftArray(): array
    {
        $array = [];
        for ($i=0; $i < 9; $i++) {
            $array[$i] = 0;
        }

        return $array;
    }

}
