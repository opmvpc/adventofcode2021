<?php

namespace Opmvpc\Aoc2021\Solvers;

use Opmvpc\Aoc2021\Parsers\ParserDay1;

class SolverDay1Part2 extends AbstractSolver
{
    /**
     * @param string $path
     */
    public function __construct(
        private string $path,
    )
    {
        $this->inputArray = ParserDay1::parse($this->path);
    }

    public function solve(): int
    {
        $counter = 0;
        for ($i = 1; $i < $this->inputArray->count() - 2; $i++) {
            $previousSum = array_sum([
                $this->inputArray[$i - 1],
                $this->inputArray[$i],
                $this->inputArray[$i + 1],
            ]);
            $actualSum = array_sum([
                $this->inputArray[$i],
                $this->inputArray[$i + 1],
                $this->inputArray[$i + 2],
            ]);
            if ($previousSum < $actualSum) {
                $counter += 1;
            }
        }
        return $counter;
    }

}
