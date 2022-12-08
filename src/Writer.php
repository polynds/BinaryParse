<?php

declare(strict_types=1);
/**
 * happy coding!!!
 */
namespace Polynds\BinaryParse;

class Writer extends BinaryProcessor implements Packable
{
    public function __construct(string $data)
    {
        parent::__construct($data);
    }

    public function writeInt8($value): string
    {
        return self::pack('c', $value);
    }

    public function writeUInt8($value): string
    {
        return self::pack('C', $value);
    }

    public function writeInt16($value): string
    {
        return self::pack('s', $value);
    }

    public function writeUInt16($value, ?ByteOrder $byteOrder = null): string
    {
        $format = 'S';
        if ($byteOrder) {
            if ($byteOrder->isBigEndian()) {
                $format = 'n';
            } elseif ($byteOrder->isLittleEndian()) {
                $format = 'v';
            }
        }

        return self::pack($format, $value);
    }

    public function writeInt64($value): string
    {
        return self::pack('q', $value);
    }

    public function writeUInt64($value, ?ByteOrder $byteOrder = null): string
    {
        $format = 'Q';
        if ($byteOrder) {
            if ($byteOrder->isBigEndian()) {
                $format = 'J';
            } elseif ($byteOrder->isLittleEndian()) {
                $format = 'P';
            }
        }

        return self::pack($format, $value);
    }

    public function writeInt32($value): string
    {
        return self::pack('l', $value);
    }

    public function writeUInt32($value, ?ByteOrder $byteOrder = null): string
    {
        $format = 'L';
        if ($byteOrder) {
            if ($byteOrder->isBigEndian()) {
                $format = 'N';
            } elseif ($byteOrder->isLittleEndian()) {
                $format = 'V';
            }
        }

        return self::pack($format, $value);
    }

    public function writeLowHexStr($value, int $byte = BinaryParse::UNSIGNED_CHAR_LENGTH): string
    {
        $length = $byte * 2;
        return self::pack('h' . $length, $value);
    }

    public function writeHighHexStr($value, int $byte = BinaryParse::UNSIGNED_CHAR_LENGTH): string
    {
        $length = $byte * 2;
        return self::pack('H' . $length, $value);
    }

    public function writeFloat($value, ?ByteOrder $byteOrder = null): string
    {
        $format = 'f';
        if ($byteOrder) {
            if ($byteOrder->isBigEndian()) {
                $format = 'G';
            } elseif ($byteOrder->isLittleEndian()) {
                $format = 'g';
            }
        }

        return self::pack($format, $value);
    }

    public function writeDouble($value, ?ByteOrder $byteOrder = null): string
    {
        $format = 'd';
        if ($byteOrder) {
            if ($byteOrder->isBigEndian()) {
                $format = 'E';
            } elseif ($byteOrder->isLittleEndian()) {
                $format = 'e';
            }
        }

        return self::pack($format, $value);
    }

    public function writeSpacePaddedStr($value): string
    {
        return self::pack('a*', $value);
    }

    public function writeNULLPaddedStr($value): string
    {
        return self::pack('A*', $value);
    }

    protected static function pack(string $format, ...$values): string
    {
        return (string) pack($format, ...$values);
    }
}
