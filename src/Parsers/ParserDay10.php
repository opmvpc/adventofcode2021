<?php

namespace Opmvpc\Aoc2021\Parsers;

use Opmvpc\Aoc2021\DataStructures\Day4\Board;
use Opmvpc\Aoc2021\DataStructures\Collection;
use Opmvpc\Aoc2021\DataStructures\Day5\Point;
use Opmvpc\Aoc2021\DataStructures\Day5\Segment;

class ParserDay10 extends AbstractParser
{
    public static function parse(string $filename): Collection
    {
        $fileContent = self::readFileContent($filename);
        return (new Collection(explode("\n", $fileContent)))
            ->filter()
            ->map(fn ($x) => str_split($x));
    }
}
