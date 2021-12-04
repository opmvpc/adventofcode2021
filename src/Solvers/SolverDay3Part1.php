<?php

namespace Opmvpc\Aoc2021\Solvers;

use Opmvpc\Aoc2021\Parsers\ParserDay3;

class SolverDay3Part1 extends AbstractSolver
{
    /**
     * AbstractSolver constructor.
     * @param string $path
     */
    public function __construct(
        private string $path,
    )
    {
        $this->inputArray = ParserDay3::parse($this->path);
    }

    public function solve(): int
    {
        $gamma = '';
        $threshold = ceil(count($this->inputArray) / 2);

        for ($i = 0; $i < strlen($this->inputArray[0]); $i++) {
            $positiveBitsCount = 0;
            foreach ($this->inputArray as $line) {
                if ($line[$i] === '1') {
                    $positiveBitsCount +=1;
                }
            }
            $gamma .= $positiveBitsCount >= $threshold ? 1 : 0;
        }

        $epsilon = strtr($gamma, ['1', '0']);

        return bindec($gamma) * bindec($epsilon);
    }

}
