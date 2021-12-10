<?php

require __DIR__ . '/vendor/autoload.php';

use Opmvpc\Aoc2021\Benchmark\SolversRunner;

error_reporting(E_ERROR | E_PARSE);
$runner = new SolversRunner();
$runner->run();

echo $runner->getResultsJson();
