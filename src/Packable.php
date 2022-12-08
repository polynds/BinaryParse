<?php

declare(strict_types=1);
/**
 * happy coding!!!
 */
namespace Polynds\BinaryParse;

interface Packable
{
    public function writeInt8($value): string;

    public function writeUInt8($value): string;

    public function writeInt16($value): string;

    public function writeUInt16($value, ?ByteOrder $byteOrder = null): string;

    public function writeInt64($value): string;

    public function writeUInt64($value, ?ByteOrder $byteOrder = null): string;

    public function writeInt32($value): string;

    public function writeUInt32($value, ?ByteOrder $byteOrder = null): string;

    public function writeLowHexStr($value, int $byte = BinaryParse::UNSIGNED_CHAR_LENGTH): string;

    public function writeHighHexStr($value, int $byte = BinaryParse::UNSIGNED_CHAR_LENGTH): string;

    public function writeFloat($value, ?ByteOrder $byteOrder = null): string;

    public function writeDouble($value, ?ByteOrder $byteOrder = null): string;

    /**
     * 以空格结尾的字符串.
     * @param mixed $value
     */
    public function writeSpacePaddedStr($value): string;

    /**
     * 以\0结尾的字符串.
     * @param mixed $value
     */
    public function writeNULLPaddedStr($value): string;
}
