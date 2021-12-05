<?php

namespace Opmvpc\Aoc2021\DataStructures\Day5;

class Point
{
    /**
     * @param int $x
     * @param int $y
     */
    public function __construct(
        private int $x,
        private int $y,
    )
    {
    }

    /**
     * @return int
     */
    public function getX(): int
    {
        return $this->x;
    }

    /**
     * @return int
     */
    public function getY(): int
    {
        return $this->y;
    }
}
