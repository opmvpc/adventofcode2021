<?php

namespace Opmvpc\Aoc2021\Solvers;

use Opmvpc\Aoc2021\Parsers\ParserDay2;

class SolverDay2Part1 extends AbstractSolver
{
    /**
     * @param string $path
     */
    public function __construct(
        private string $path,
    )
    {
        $this->inputArray = ParserDay2::parse($this->path);
    }

    public function solve(): int
    {
        $horizontalPosition = 0;
        $depth = 0;

        foreach ($this->inputArray as $command) {
            if ($command[0] === 'forward') {
                $horizontalPosition += $command[1];
            } else if ($command[0] === 'down') {
                $depth += $command[1];
            } else if ($command[0] === 'up') {
                $depth -= $command[1];
            }
        }

        return $horizontalPosition * $depth;
    }

}
