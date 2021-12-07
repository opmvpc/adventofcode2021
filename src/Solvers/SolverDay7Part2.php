<?php

namespace Opmvpc\Aoc2021\Solvers;

class SolverDay7Part2 extends SolverDay7Part1
{
    public function solve(): int
    {
        $results = [];

        $maxVerticalPosition = max($this->inputArray);

        for ($i = 0; $i <= $maxVerticalPosition; $i++) {
            if (!array_key_exists($i, $results)) {
                $total = 0;
                foreach ($this->inputArray as $crab) {
                    $number = abs($i - $crab);
                    $total += (($number + 1) * $number) / 2;
                }
                $results[$i] = $total;
            }
        }

        return min($results);
    }
}
