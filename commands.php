#!/usr/bin/env php
<?php

require __DIR__ . '/vendor/autoload.php';

use Opmvpc\Aoc2021\Command\BenchCommand;
use Symfony\Component\Console\Application;

error_reporting(E_ERROR | E_PARSE);

$application = new Application();
$application->add(new BenchCommand());

try {
    $application->run();
} catch (Exception $e) {
    echo($e);
}

