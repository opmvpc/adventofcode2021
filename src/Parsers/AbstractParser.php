<?php

namespace Opmvpc\Aoc2021\Parsers;

use Opmvpc\Aoc2021\DataStructures\Collection;

abstract class AbstractParser implements ParserContract
{
    public static function parse(string $filename): Collection
    {
        $fileContent = self::readFileContent($filename);
        $content = explode("\n", $fileContent);
        return (new Collection($content))->filter();
    }

    /**
     * @param string $filename
     * @return false|string
     */
    public static function readFileContent(string $filename): string|false
    {
        return file_get_contents(dirname(__FILE__, 3) . "/files/" . $filename);
    }
}
