<?php

namespace Opmvpc\Aoc2021\Solvers;

use Opmvpc\Aoc2021\DataStructures\Board;
use Opmvpc\Aoc2021\DataStructures\Collection;
use Opmvpc\Aoc2021\Parsers\ParserDay4;

class SolverDay4Part2 extends AbstractSolver
{
    private Collection $draw;
    private Collection $boards;

    /**
     * AbstractSolver constructor.
     * @param string $path
     */
    public function __construct(
        private string $path,
    )
    {
        $this->inputArray = ParserDay4::parse($this->path);
        $this->draw = $this->inputArray['draw'];
        $this->boards = $this->inputArray['boards'];
    }

    public function solve(): int
    {
        $resolvedBlocksIds = [];
        foreach ($this->draw as $number) {
            foreach ($this->boards as $boardIndex => $board) {
                if (! in_array($boardIndex, $resolvedBlocksIds)) {
                    /**
                     * @var int $number
                     * @var Board $board
                     */
                    $board->markCell($number);
                    if ($board->hasWon()) {
                        $resolvedBlocksIds[] = $boardIndex;
                    }

                    if (count($resolvedBlocksIds) === $this->boards->count()){
                        return $number * $board->getSum();
                    }
                }
            }
        }

        return 1;
    }

}
