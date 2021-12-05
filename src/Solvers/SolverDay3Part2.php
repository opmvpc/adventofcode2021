<?php

namespace Opmvpc\Aoc2021\Solvers;

use Opmvpc\Aoc2021\DataStructures\Collection;
use Opmvpc\Aoc2021\Parsers\ParserDay3;

class SolverDay3Part2 extends AbstractSolver
{
    /**
     * @param string $path
     */
    public function __construct(
        private string $path,
    )
    {
        $this->inputArray = ParserDay3::parse($this->path);
    }

    public function solve(): int
    {
        $oxygen = $this->getRate($this->inputArray, '1');
        $co2 = $this->getRate($this->inputArray, '0');

        return $oxygen * $co2;
    }

    /**
     * @param Collection $data
     * @return int
     */
    public function getRate(Collection $data, string $toFind): int
    {
        $lineLength = strlen($data[0]);

        for ($i = 0; $i < $lineLength; $i++) {
            $positiveBitsCount = 0;

            foreach ($data as $line) {
                if ($line[$i] === $toFind) {
                    $positiveBitsCount += 1;
                }
            }

            $threshold = ceil(count($data) / 2);
            if ($data->count() === 1) {
                break;
            } elseif ($positiveBitsCount === ($data->count() / 2)) {
                $toKeep = $toFind;
            } elseif ($toFind === '1') {
                $toKeep = $positiveBitsCount >= $threshold ? '1' : '0';
            } else {
                $toKeep = $positiveBitsCount < $threshold ? '0' : '1';
            }

            $data = $data->filter(fn($line) => $line[$i] === $toKeep);
        }

        return bindec($data->reIndexElements()->first());
    }

}
