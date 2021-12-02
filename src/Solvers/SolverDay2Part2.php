<?php

namespace Opmvpc\Aoc2021\Solvers;

use Opmvpc\Aoc2021\Parsers\ParserDay2;

class SolverDay2Part2 extends AbstractSolver
{
    /**
     * AbstractSolver constructor.
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
        $aim = 0;

        foreach ($this->inputArray as $command) {
            if ($command[0] === 'forward') {
                $horizontalPosition += $command[1];
                $depth += $command[1] * $aim;
            } else if ($command[0] === 'down') {
                $aim += $command[1];
            } else if ($command[0] === 'up') {
                $aim -= $command[1];
            }
        }

        return $horizontalPosition * $depth;
    }

}
