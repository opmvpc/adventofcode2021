<?php

namespace Opmvpc\Aoc2021\Command;

use Opmvpc\Aoc2021\Benchmark\BenchResult;
use Opmvpc\Aoc2021\Benchmark\SolversRunner;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class BenchCommand extends Command
{
    protected static $defaultName = 'bench';

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $runner = new SolversRunner();
        $runner->run();

        $results = $runner->getResults()->map(function (BenchResult $result): array {
            return [
                $result->getDay(),
                $result->getExercise(),
                $result->getParsingTime(),
                $result->getSolvingTime(),
                $result->getParsingTime() + $result->getSolvingTime(),
            ];
        })->toArray();

        $io->table(
            ['Day', 'Exercise', 'Parsing Time (ms)', 'Solving Time (ms)', 'Total Time (ms)'],
            $results,
        );

        return Command::SUCCESS;
    }
}
