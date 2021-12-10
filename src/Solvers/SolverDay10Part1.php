<?php

namespace Opmvpc\Aoc2021\Solvers;

use Opmvpc\Aoc2021\Parsers\ParserDay10;
use SplFixedArray;
use function ord;

class SolverDay10Part1 extends AbstractSolver
{
    /**
     * @param string $path
     */
    public function __construct(
        protected string $path,
    )
    {
        $this->inputArray = ParserDay10::parse($this->path);
    }

    public function solve(): int
    {
        $total = 0;
        $stack = new SplFixedArray(256);

        $charMap = new SplFixedArray(128);
        $charMap[ord(')')] = '(';
        $charMap[ord(']')] = '[';
        $charMap[ord('}')] = '{';
        $charMap[ord('>')] = '<';

        $isStarter = new SplFixedArray(128);
        $isStarter[ord(')')] = false;
        $isStarter[ord(']')] = false;
        $isStarter[ord('}')] = false;
        $isStarter[ord('>')] = false;
        $isStarter[ord('(')] = true;
        $isStarter[ord('[')] = true;
        $isStarter[ord('{')] = true;
        $isStarter[ord('<')] = true;

        $score = new SplFixedArray(128);
        $score[ord(')')] = 3;
        $score[ord(']')] = 57;
        $score[ord('}')] = 1197;
        $score[ord('>')] = 25137;

        foreach ($this->inputArray as $line) {
            $stackIndex = -1;
            foreach ($line as $char) {
                if ($isStarter[ord($char)]) {
                    $stackIndex += 1;
                    $stack[$stackIndex] = $char;
                } else {
                    if ($charMap[ord($char)] === $stack[$stackIndex]) {
                        $stackIndex -= 1;
                    } else {
                        $total += $score[ord($char)];
                        break;
                    }
                }
            }
        }

        return $total;
    }
}
