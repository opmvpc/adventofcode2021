<?php

namespace Opmvpc\Aoc2021\Solvers;

use Ds\Stack;
use Opmvpc\Aoc2021\Parsers\ParserDay10;

class SolverDay10Part2 extends AbstractSolver
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
        $scores = [];
        foreach ($this->inputArray as $line) {
            $stack = new Stack();
            foreach ($line as $char) {
                if (!in_array($char, [']', '}', ')', '>'])) {
                    $stack->push($char);
                } else {
                    if ($char === ']' && $stack->peek() === '[') {
                        $stack->pop();
                    } else if ($char === '}' && $stack->peek() === '{') {
                        $stack->pop();
                    } else if ($char === ')' && $stack->peek() === '(') {
                        $stack->pop();
                    } else if ($char === '>' && $stack->peek() === '<') {
                        $stack->pop();
                    } else {
                        $stack->clear();
                        break;
                    }
                }
            }
            $completionScore = 0;
            while (!$stack->isEmpty()) {
                $completionScore *= 5;
                $completionScore += match ($stack->pop()) {
                    '(' => 1,
                    '[' => 2,
                    '{' => 3,
                    '<' => 4,
                };
            }
            $scores[] = $completionScore;
        }
        $scores = array_filter($scores);
        sort($scores);

        return $scores[floor(count($scores)/2)];
    }
}
