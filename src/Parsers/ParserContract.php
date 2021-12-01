<?php

namespace Opmvpc\Aoc2021\Parsers;

use Opmvpc\Aoc2021\DataStructures\Collection;

interface ParserContract
{
    public static function parse(string $filename): Collection;
}
