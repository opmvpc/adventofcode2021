<?php

namespace Opmvpc\Aoc2021\Solvers;

use Opmvpc\Aoc2021\Parsers\ParserDay7;

class SolverDay7Part1 extends AbstractSolver
{
    /**
     * @param string $path
     */
    public function __construct(
        protected string $path,
    )
    {
        $this->inputArray = ParserDay7::parse($this->path);
    }

    public function solve(): int
    {
        $results = [];

        foreach ($this->inputArray as $verticalPosition) {
            if (!array_key_exists($verticalPosition, $results)) {
                $total = 0;
                foreach ($this->inputArray as $crab) {
                    $total += abs($verticalPosition - $crab);
                }
                $results[$verticalPosition] = $total;
            }
        }

        return min($results);
    }
}
