<?php

declare(strict_types=1);
/**
 * happy coding!!!
 */
namespace Polynds\BinaryParse;

class BinaryParse
{
    public const UNSIGNED_CHAR_LENGTH = 1;

    public const UNSIGNED_SHORT_LENGTH = 2;

    public const UNSIGNED_INT32_LENGTH = 4;

    public const UNSIGNED_FLOAT_LENGTH = 4;

    public const UNSIGNED_INT64_LENGTH = 8;

    public const UNSIGNED_DOUBLE_LENGTH = 8;

    public static function stream(string $filename, string $mode = 'rb', int $size = null): string
    {
        $stream = function (string $filename, string $mode, int $size) {
            $stream = fopen($filename, $mode);
            $bytes = fread($stream, $size);

            fclose($stream);

            return $bytes;
        };

        return $stream($filename, $mode, $size ?? filesize($filename));
    }
}
