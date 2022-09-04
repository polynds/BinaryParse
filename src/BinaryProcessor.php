<?php

declare(strict_types=1);
/**
 * happy coding.
 */
namespace Polynds\BinaryParse;

abstract class BinaryProcessor
{
    protected string $data;

    protected int $total;

    protected int $offset;

    public function __construct(string $data)
    {
        $this->data = $data;
        $this->total = strlen($data);
        $this->offset = 0;
    }

    public function skip(int $byte = Binary::UNSIGNED_CHAR_LENGTH)
    {
        $this->readBytes($byte);
    }

    protected function readBytes(int $byte = Binary::UNSIGNED_CHAR_LENGTH)
    {
        $bytes = substr($this->data, 0, $byte);
        $this->offset += $byte;
        $this->data = substr($this->data, $byte);
        return $bytes;
    }
}
