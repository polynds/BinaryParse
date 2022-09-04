<?php

declare(strict_types=1);
/**
 * happy coding.
 */
namespace Polynds\BinaryParse;

interface Unpackable
{
    public function readInt8(): int;

    public function readUInt8(): int;

    public function readInt16(): int;

    public function readUInt16(?ByteOrder $byteOrder = null): int;

    public function readInt64(): int;

    public function readUInt64(?ByteOrder $byteOrder = null): int;

    public function readInt32(): int;

    public function readUInt32(?ByteOrder $byteOrder = null): int;

    public function readLowHexStr(int $byte = Binary::UNSIGNED_CHAR_LENGTH): string;

    public function readHighHexStr(int $byte = Binary::UNSIGNED_CHAR_LENGTH): string;

    public function readFloat(?ByteOrder $byteOrder = null): float;

    public function readDouble(?ByteOrder $byteOrder = null): float;

    /**
     * 以空格结尾的字符串.
     */
    public function readSpacePaddedStr(int $byte): string;

    /**
     * 以\0结尾的字符串.
     */
    public function readNULLPaddedStr(int $byte): string;
}
