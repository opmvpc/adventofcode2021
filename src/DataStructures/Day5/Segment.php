<?php

namespace Opmvpc\Aoc2021\DataStructures\Day5;

class Segment
{
    private Point $a;
    private Point $b;

    /**
     * @param Point $a
     * @param Point $b
     */
    public function __construct(Point $a, Point $b)
    {
        $this->a = $a;
        $this->b = $b;
    }

    /**
     * @return Point
     */
    public function getA(): Point
    {
        return $this->a;
    }

    /**
     * @return Point
     */
    public function getB(): Point
    {
        return $this->b;
    }
}
