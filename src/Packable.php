<?php

declare(strict_types=1);
/**
 * happy coding.
 */
namespace Polynds\BinaryParse;

interface Packable
{
    public function writeInt8(): string;

    public function writeUInt8(): string;

    public function writeInt16(): string;

    public function writeUInt16(?ByteOrder $byteOrder = null): string;

    public function writeInt64(): string;

    public function writeUInt64(?ByteOrder $byteOrder = null): string;

    public function writeInt32(): string;

    public function writeUInt32(?ByteOrder $byteOrder = null): string;

    public function writeLowHexStr(int $byte): string;

    public function writeHighHexStr(int $byte): string;

    public function writeFloat(?ByteOrder $byteOrder = null): string;

    public function writeDouble(?ByteOrder $byteOrder = null): string;

    /**
     * 以空格结尾的字符串.
     */
    public function writeSpacePaddedStr(int $byte): string;

    /**
     * 以\0结尾的字符串.
     */
    public function writeNULLPaddedStr(int $byte): string;
}
