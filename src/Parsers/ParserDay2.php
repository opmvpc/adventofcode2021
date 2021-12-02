<?php

namespace Opmvpc\Aoc2021\Parsers;

use Opmvpc\Aoc2021\DataStructures\Collection;

class ParserDay2 extends AbstractParser
{
    public static function parse(string $filename): Collection
    {
        $fileContent = self::readFileContent($filename);
        $content = explode("\n", $fileContent);

        return (new Collection($content))
            ->filter()
            ->map(fn ($line) => explode(" ", $line));
    }
}
