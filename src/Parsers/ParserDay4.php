<?php

namespace Opmvpc\Aoc2021\Parsers;

use Opmvpc\Aoc2021\DataStructures\Board;
use Opmvpc\Aoc2021\DataStructures\Collection;

class ParserDay4 extends AbstractParser
{
    public static function parse(string $filename): Collection
    {
        $fileContent = self::readFileContent($filename);
        $content = explode("\n", $fileContent);

        $draw = explode(',', $content[0]);
        $draw = new Collection($draw);

        $boards = new Collection();
        for ($i = 2; $i < count($content); $i += 6) {
            $lines = new Collection();
            for ($j = 0; $j < 5; $j++) {
                $line = explode(' ', $content[$i + $j]);
                $lines[$j] = (new Collection($line))->filter(fn ($x) => $x !== "");
                $lines[$j]->reIndexElements();
            }
            $boards[($i-2)/6] = $lines;
        }

        $data = new Collection();
        $data["draw"] = $draw;
        $data["boards"] = $boards->map(fn ($board) => new Board($board));
        return $data;
    }
}
