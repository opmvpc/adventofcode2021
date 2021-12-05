<?php

namespace Opmvpc\Aoc2021\Parsers;

use Opmvpc\Aoc2021\DataStructures\Day4\Board;
use Opmvpc\Aoc2021\DataStructures\Collection;
use Opmvpc\Aoc2021\DataStructures\Day5\Point;
use Opmvpc\Aoc2021\DataStructures\Day5\Segment;

class ParserDay5 extends AbstractParser
{
    public static function parse(string $filename): array
    {
        $fileContent = self::readFileContent($filename);
        $content = (new Collection(explode("\n", $fileContent)))->filter();

        $data = [];
        foreach ($content as $line) {
            $segments = explode(' -> ', $line);
            $a = explode(',', $segments[0]);
            $b = explode(',', $segments[1]);

            $segment = array_merge($a, $b);
            $data[] = $segment;
        }

        return $data;
    }
}
