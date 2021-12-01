<?php

namespace Solvers;

use Opmvpc\Aoc2021\Solvers\SolverDay1Part1;
use Opmvpc\Aoc2021\Solvers\SolverDay1Part2;
use PHPUnit\Framework\TestCase;

class SolversTest extends TestCase
{
    public function test_1_1(): void
    {
        $result = (new SolverDay1Part1("1/1"))->solve();
        $this->assertEquals(7, $result);
        $result = (new SolverDay1Part1("1/2"))->solve();
        $this->assertEquals(1215, $result);
    }

    public function test_1_2(): void
    {
        $result = (new SolverDay1Part2("1/1"))->solve();
        $this->assertEquals(5, $result);
        $result = (new SolverDay1Part2("1/2"))->solve();
        $this->assertEquals(1150, $result);
    }
}
