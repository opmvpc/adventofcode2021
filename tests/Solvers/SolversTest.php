<?php

namespace Solvers;

use Opmvpc\Aoc2021\Solvers\SolverDay1Part1;
use Opmvpc\Aoc2021\Solvers\SolverDay1Part2;
use Opmvpc\Aoc2021\Solvers\SolverDay2Part1;
use Opmvpc\Aoc2021\Solvers\SolverDay2Part2;
use Opmvpc\Aoc2021\Solvers\SolverDay3Part1;
use Opmvpc\Aoc2021\Solvers\SolverDay3Part2;
use Opmvpc\Aoc2021\Solvers\SolverDay4Part1;
use Opmvpc\Aoc2021\Solvers\SolverDay4Part2;
use Opmvpc\Aoc2021\Solvers\SolverDay5Part1;
use Opmvpc\Aoc2021\Solvers\SolverDay5Part2;
use Opmvpc\Aoc2021\Solvers\SolverDay6Part1;
use Opmvpc\Aoc2021\Solvers\SolverDay6Part2;
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

    public function test_3_1(): void
    {
        $result = (new SolverDay3Part1("3/1"))->solve();
        $this->assertEquals(198, $result);
        $result = (new SolverDay3Part1("3/2"))->solve();
        $this->assertEquals(841526, $result);
    }

    public function test_3_2(): void
    {
        $result = (new SolverDay3Part2("3/1"))->solve();
        $this->assertEquals(230, $result);
        $result = (new SolverDay3Part2("3/2"))->solve();
        $this->assertEquals(4790390, $result);
    }

    public function test_4_1(): void
    {
        $result = (new SolverDay4Part1("4/1"))->solve();
        $this->assertEquals(4512, $result);
        $result = (new SolverDay4Part1("4/2"))->solve();
        $this->assertEquals(74320, $result);
    }

    public function test_4_2(): void
    {
        $result = (new SolverDay4Part2("4/1"))->solve();
        $this->assertEquals(1924, $result);
        $result = (new SolverDay4Part2("4/2"))->solve();
        $this->assertEquals(17884, $result);
    }

    public function test_5_1(): void
    {
        $result = (new SolverDay5Part1("5/1"))->solve();
        $this->assertEquals(5, $result);
        $result = (new SolverDay5Part1("5/2"))->solve();
        $this->assertEquals(5197, $result);
    }

    public function test_5_2(): void
    {
        $result = (new SolverDay5Part2("5/1"))->solve();
        $this->assertEquals(12, $result);
        $result = (new SolverDay5Part2("5/2"))->solve();
        $this->assertEquals(18605, $result);
    }

    public function test_6_1(): void
    {
        $result = (new SolverDay6Part1("6/1"))->solve();
        $this->assertEquals(5934, $result);
        $result = (new SolverDay6Part1("6/2"))->solve();
        $this->assertEquals(396210, $result);
    }

    public function test_6_2(): void
    {
        $result = (new SolverDay6Part2("6/1"))->solve();
        $this->assertEquals(26984457539, $result);
        $result = (new SolverDay6Part2("6/2"))->solve();
        $this->assertEquals(1770823541496, $result);
    }
}
