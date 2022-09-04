<?php

declare(strict_types=1);
/**
 * happy coding.
 */
namespace Polynds\BinaryParse;

class Writer extends BinaryProcessor implements Packable
{
    public function __construct(string $data)
    {
        parent::__construct($data);
    }

    public function writeInt8(): string
    {
        // TODO: Implement writeInt8() method.
    }

    public function writeUInt8(): string
    {
        // TODO: Implement writeUInt8() method.
    }

    public function writeInt16(): string
    {
        // TODO: Implement writeInt16() method.
    }

    public function writeUInt16(?ByteOrder $byteOrder = null): string
    {
        // TODO: Implement writeUInt16() method.
    }

    public function writeInt64(): string
    {
        // TODO: Implement writeInt64() method.
    }

    public function writeUInt64(?ByteOrder $byteOrder = null): string
    {
        // TODO: Implement writeUInt64() method.
    }

    public function writeInt32(): string
    {
        // TODO: Implement writeInt32() method.
    }

    public function writeUInt32(?ByteOrder $byteOrder = null): string
    {
        // TODO: Implement writeUInt32() method.
    }

    public function writeLowHexStr(int $byte): string
    {
        // TODO: Implement writeLowHexStr() method.
    }

    public function writeHighHexStr(int $byte): string
    {
        // TODO: Implement writeHighHexStr() method.
    }

    public function writeFloat(?ByteOrder $byteOrder = null): string
    {
        // TODO: Implement writeFloat() method.
    }

    public function writeDouble(?ByteOrder $byteOrder = null): string
    {
        // TODO: Implement writeDouble() method.
    }

    public function writeSpacePaddedStr(int $byte): string
    {
        // TODO: Implement writeSpacePaddedStr() method.
        return '';
    }

    public function writeNULLPaddedStr(int $byte): string
    {
        // TODO: Implement writeNULLPaddedStr() method.
        return '';
    }
}
