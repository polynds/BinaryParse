<?php

declare(strict_types=1);
/**
 * happy coding.
 */
namespace Polynds\BinaryParse;

class Reader extends BinaryProcessor implements Unpackable
{
    public function __construct(string $data)
    {
        parent::__construct($data);
    }

    public function readInt8(): int
    {
        return self::unpack('c', $this->readBytes());
    }

    public function readUInt8(): int
    {
        return self::unpack('C', $this->readBytes());
    }

    public function readInt16(): int
    {
        return self::unpack('s', $this->readBytes(Binary::UNSIGNED_SHORT_LENGTH));
    }

    public function readUInt16(?ByteOrder $byteOrder = null): int
    {
        $bytes = $this->readBytes(Binary::UNSIGNED_SHORT_LENGTH);
        $format = 'S';
        if ($byteOrder) {
            if ($byteOrder->isBigEndian()) {
                $format = 'n';
            } elseif ($byteOrder->isLittleEndian()) {
                $format = 'v';
            }
        }

        return self::unpack($format, $bytes);
    }

    public function readInt64(): int
    {
        return self::unpack('q', $this->readBytes(Binary::UNSIGNED_INT64_LENGTH));
    }

    public function readUInt64(?ByteOrder $byteOrder = null): int
    {
        $bytes = $this->readBytes(Binary::UNSIGNED_INT64_LENGTH);
        $format = 'Q';
        if ($byteOrder) {
            if ($byteOrder->isBigEndian()) {
                $format = 'J';
            } elseif ($byteOrder->isLittleEndian()) {
                $format = 'P';
            }
        }

        return self::unpack($format, $bytes);
    }

    public function readInt32(): int
    {
        return self::unpack('l', $this->readBytes(Binary::UNSIGNED_INT32_LENGTH));
    }

    public function readUInt32(?ByteOrder $byteOrder = null): int
    {
        $bytes = $this->readBytes(Binary::UNSIGNED_INT32_LENGTH);
        $format = 'L';
        if ($byteOrder) {
            if ($byteOrder->isBigEndian()) {
                $format = 'N';
            } elseif ($byteOrder->isLittleEndian()) {
                $format = 'V';
            }
        }

        return self::unpack($format, $bytes);
    }

    public function readLowHexStr(int $byte = Binary::UNSIGNED_CHAR_LENGTH): string
    {
        $length = $byte * 2;
        return self::unpack('h' . $length, $this->readBytes($byte));
    }

    public function readHighHexStr(int $byte = Binary::UNSIGNED_CHAR_LENGTH): string
    {
        $length = $byte * 2;
        return self::unpack('H' . $length, $this->readBytes($byte));
    }

    public function readFloat(?ByteOrder $byteOrder = null): float
    {
        $bytes = $this->readBytes(Binary::UNSIGNED_FLOAT_LENGTH);
        $format = 'f';
        if ($byteOrder) {
            if ($byteOrder->isBigEndian()) {
                $format = 'G';
            } elseif ($byteOrder->isLittleEndian()) {
                $format = 'g';
            }
        }

        return self::unpack($format, $bytes);
    }

    public function readDouble(?ByteOrder $byteOrder = null): float
    {
        $bytes = $this->readBytes(Binary::UNSIGNED_DOUBLE_LENGTH);
        $format = 'd';
        if ($byteOrder) {
            if ($byteOrder->isBigEndian()) {
                $format = 'E';
            } elseif ($byteOrder->isLittleEndian()) {
                $format = 'e';
            }
        }

        return self::unpack($format, $bytes);
    }

    /**
     * 以空格结尾的字符串.
     */
    public function readSpacePaddedStr(int $byte = 1): string
    {
        return (string) self::unpack('a*', $this->readBytes($byte));
    }

    /**
     * 以\0结尾的字符串.
     */
    public function readNULLPaddedStr(int $byte = 1): string
    {
        return (string) self::unpack('A*', $this->readBytes($byte));
    }

    protected static function unpack(string $format, string $string, int $offset = 0)
    {
        $data = unpack($format, $string, $offset);
        return is_array($data) ? $data[1] : $data;
    }
}
