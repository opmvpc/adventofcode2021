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
            $fishesByDaysLeftForNextDay = $this->makeEmtpyDaysLeftArray();
            foreach ($fishesByDaysLeftForCurrentDay as $id => $fishCount) {
                if ($id === 0) {
                    $fishesByDaysLeftForNextDay[8] = $fishCount;
                    $fishesByDaysLeftForNextDay[6] = $fishCount;
                } else {
                    $fishesByDaysLeftForNextDay[$id - 1] += $fishCount;
                }
            }
            $fishesByDaysLeftForCurrentDay = $fishesByDaysLeftForNextDay;
        }

        return array_sum($fishesByDaysLeftForCurrentDay);
    }

    private function makeEmtpyDaysLeftArray(): array
    {
        $array = [];
        for ($i=0; $i < 8; $i++) {
            $array[$i] = 0;
        }

        return $array;
    }

}
