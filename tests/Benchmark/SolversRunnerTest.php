<?php

namespace Benchmark;

use Opmvpc\Aoc2021\Benchmark\SolversRunner;
use PHPUnit\Framework\TestCase;

class SolversRunnerTest extends TestCase
{
    public function testBench(): void
    {
        $runner = new SolversRunner();
        $runner->run();
        $this->assertStringContainsString('[{"day":1,"exercise":1,', $runner->getResultsJson());
    }
}
