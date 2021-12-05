<?php

namespace Opmvpc\Aoc2021\Benchmark;

use Opmvpc\Aoc2021\DataStructures\Collection;

class SolversRunner
{
    private int $days;

    private Collection $results;

    public function __construct()
    {
        $this->days = $this->getDays();
        $this->results = new Collection();
    }

    private function getDays(): int
    {
        $filesPath = dirname(__FILE__, 3) . "/files/";
        $dirContent = scandir($filesPath);

        return $dirContent[array_key_last($dirContent)];
    }

    public function run(): void
    {
        foreach (range(1, $this->days) as $day) {
            foreach (range(1, 2) as $exercise) {
                $result = new BenchResult($day, $exercise);
                $this->results->add($result);
                try {
                    $result->setParsingTime($this->runParser($day));
                    $result->setSolvingTime($this->runSolver($day, $exercise));
                } catch (\Error $e) {
                }
            }
        }
    }

    private function runParser(int $day): float
    {
        $parserName = '\Opmvpc\Aoc2021\Parsers\ParserDay' . $day;
        $filePath = $day . '/' . 2;
        $parser = new $parserName();

        $start_time = microtime(true);
        $parser->parse($filePath);
        $end_time = microtime(true);

        return ($end_time - $start_time) * 1000;
    }

    private function runSolver(int $day, int $exercise): float
    {
        $parserName = '\Opmvpc\Aoc2021\Solvers\SolverDay' . $day . 'Part' . $exercise;
        $filePath = $day . '/' . 2;
        $solver = new $parserName($filePath);

        $start_time = microtime(true);
        $solver->solve();
        $end_time = microtime(true);

        return ($end_time - $start_time) * 1000;
    }

    /**
     * @return Collection
     */
    public function getResults(): Collection
    {
        return $this->results;
    }

    public function getResultsJson(): string
    {
        return json_encode($this->results->map(fn ($result) => $result->toArray())->toArray());
    }
}
