<?php

namespace Opmvpc\Aoc2021\Parsers;

use Exception;
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
     * @return string
     */
    public static function readFileContent(string $filename): string
    {
        $fileContent = file_get_contents(dirname(__FILE__, 3) . "/files/" . $filename);
        if ($fileContent === false) {
            $fileContent = "";
        }
        return $fileContent;
    }
}
