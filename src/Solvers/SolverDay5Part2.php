<?php

namespace Opmvpc\Aoc2021\Solvers;

class SolverDay5Part2 extends SolverDay5Part1
{

    public function solve(): int
    {
        foreach ($this->inputArray as $segment) {
            $this->addPointsToBoard($segment);
        }

        return $this->countIntersections();
    }
}
