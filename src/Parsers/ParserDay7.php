<?php

namespace Opmvpc\Aoc2021\Parsers;

use Opmvpc\Aoc2021\DataStructures\Day4\Board;
use Opmvpc\Aoc2021\DataStructures\Collection;
use Opmvpc\Aoc2021\DataStructures\Day5\Point;
use Opmvpc\Aoc2021\DataStructures\Day5\Segment;

class ParserDay7 extends AbstractParser
{
    public static function parse(string $filename): array
    {
        $fileContent = self::readFileContent($filename);
        $content = (new Collection(explode("\n", $fileContent)))->filter();

        return explode(',', $content[0]);
    }
}
