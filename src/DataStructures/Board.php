<?php

namespace Opmvpc\Aoc2021\DataStructures;

class Board
{
    private int $sum;
    private Collection $columns;
    private Collection $lines;
    private Collection $cells;

    public function __construct(Collection $board)
    {
        $this->sum = $this->computeBoardSum($board);
        $this->columns = $this->mapToZero();
        $this->lines = $this->mapToZero();
        $this->createCells($board);
    }

    private function createCells(Collection $board)
    {
        $this->cells = new Collection();
        foreach ($board as $x => $line) {
            foreach ($line as $y => $cell) {
                $this->cells[$board[$x][$y]] = new Cell($x, $y);
            }
        }
    }

    /**
     * @return int
     */
    public function getSum(): int
    {
        return $this->sum;
    }

    /**
     * @return Collection
     */
    public function mapToZero(): Collection
    {
        return (new Collection(range(0, 5)))
            ->map(fn($x) => 0);
    }

    private function computeBoardSum(Collection $board): int
    {
        return $board
            ->map(fn (Collection $x) => $x->sum())
            ->sum();
    }

    public function markCell(int $number)
    {
        if ($this->cells->offsetExists($number)) {
            /**
             * @var Cell $cell
             */
            $cell = $this->cells[$number];
            $this->lines[$cell->getX()] += 1;
            $this->columns[$cell->getY()] += 1;
            $this->sum -= $number;
        }
    }

    public function hasWon(): bool
    {
        foreach ($this->lines as $line) {
            if ($line === 5) {
                return true;
            }
        }

        foreach ($this->columns as $column) {
            if ($column === 5) {
                return true;
            }
        }

        return false;
    }

}
