<?php

require __DIR__ . '/vendor/autoload.php';
use Opmvpc\Aoc2021\Solvers\SolverDay4Part1;

$start_time = microtime(true);
$result = (new SolverDay4Part1("4/2"))->solve();
$end_time = microtime(true);
$execution_time = ($end_time - $start_time);

echo " Execution time of script = ".$execution_time." sec";
