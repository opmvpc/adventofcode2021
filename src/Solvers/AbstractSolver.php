<?php

namespace Opmvpc\Aoc2021\Solvers;

use Opmvpc\Aoc2021\DataStructures\Collection;
use Opmvpc\Aoc2021\Parsers\ParserDay1;

abstract class AbstractSolver implements SolverContract
{
    protected Collection $inputArray;

    public function solve(): int
    {
        return 0;
    }
}
