<?php

namespace Opmvpc\Aoc2021\Solvers;

use Opmvpc\Aoc2021\Parsers\ParserDay1;

class SolverDay1Part1 extends AbstractSolver
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
        for ($i = 1; $i < $this->inputArray->count(); $i++) {
            if ($this->inputArray[$i - 1] <= $this->inputArray[$i]) {
                $counter += 1;
            }
        }
        return $counter;
    }

}
