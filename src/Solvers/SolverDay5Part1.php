<?php

namespace Opmvpc\Aoc2021\Solvers;

use Closure;
use Opmvpc\Aoc2021\Parsers\ParserDay5;

class SolverDay5Part1 extends AbstractSolver
{
    protected array $board;

    /**
     * @param string $path
     */
    public function __construct(
        protected string $path,
    )
    {
        $this->inputArray = ParserDay5::parse($this->path);
        $this->board = [];
    }

    public function solve(): int
    {
        $segments = $this->getStraightLines();

        foreach ($segments as $segment) {
            $this->addPointsToBoard($segment);
        }

        return $this->countIntersections();
    }

    protected function countIntersections(): int
    {
        $count = 0;
        foreach ($this->board as $line) {
            foreach ($line as $cell)
            {
                if ($cell >= 2) {
                    $count += 1;
                }
            }
        }

        return $count;
    }

    /**
     * @param array $segment
     */
    public function addPointsToBoard(array $segment): void
    {
        [$x1, $y1, $x2, $y2] = $segment;

        $rangeX = range($x1, $x2);
        $rangeY = range($y1, $y2);
        $rangeX = count($rangeX) > 1 ? $rangeX : $this->createStraightRange($x1, count($rangeY));
        $rangeY = count($rangeY) > 1 ? $rangeY : $this->createStraightRange($y1, count($rangeX));

        for ($i = 0; $i < count($rangeX); $i++) {
            $this->board[$rangeX[$i]][$rangeY[$i]] ??= 0;
            $this->board[$rangeX[$i]][$rangeY[$i]] += 1;
        }
    }

    /**
     * @return array
     */
    public function getStraightLines(): array
    {
        $segments = [];
        foreach ($this->inputArray as $segment) {
            [$x1, $y1, $x2, $y2] = $segment;
            if ($x1 === $x2 || $y1 === $y2) {
                $segments[] = $segment;
            }
        }

        return $segments;
    }

    private function createStraightRange(int $n, int $count): array
    {
        $array = [];

        for ($i = 0; $i < $count; $i++) {
            $array[] = $n;
        }

        return $array;
    }

}
