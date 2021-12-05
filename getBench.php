<?php

require __DIR__ . '/vendor/autoload.php';

use Opmvpc\Aoc2021\Benchmark\SolversRunner;

$runner = new SolversRunner();
$runner->run();

echo( $runner->getResultsJson());
