<?php

namespace Opmvpc\Aoc2021\Solvers;

use Opmvpc\Aoc2021\DataStructures\Collection;

abstract class AbstractSolver implements SolverContract
{
    protected Collection|array $inputArray;

    public function solve(): int
    {
        return 0;
    }
}
