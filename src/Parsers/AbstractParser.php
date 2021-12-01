<?php

namespace Opmvpc\Aoc2021\Parsers;

use Opmvpc\Aoc2021\DataStructures\Collection;

abstract class AbstractParser implements ParserContract
{
    public static function parse(string $filename): Collection
    {
        $fileContent = file_get_contents(dirname(__FILE__, 3) . "/files/". $filename);
        $content = explode("\n", $fileContent);
        return (new Collection($content))->filter();
    }
}
