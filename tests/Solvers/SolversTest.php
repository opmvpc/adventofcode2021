<?php

namespace Solvers;

use Opmvpc\Aoc2021\Solvers\SolverDay1Part1;
use Opmvpc\Aoc2021\Solvers\SolverDay1Part2;
use Opmvpc\Aoc2021\Solvers\SolverDay2Part1;
use Opmvpc\Aoc2021\Solvers\SolverDay2Part2;
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

    public function test_2_1(): void
    {
        $result = (new SolverDay2Part1("2/1"))->solve();
        $this->assertEquals(150, $result);
        $result = (new SolverDay2Part1("2/2"))->solve();
        $this->assertEquals(2117664, $result);
    }

    public function test_2_2(): void
    {
        $result = (new SolverDay2Part2("2/1"))->solve();
        $this->assertEquals(900, $result);
        $result = (new SolverDay2Part2("2/2"))->solve();
        $this->assertEquals(2073416724, $result);
    }
}
