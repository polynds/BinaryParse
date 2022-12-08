<?php

declare(strict_types=1);
/**
 * happy coding!!!
 */
namespace Polynds\Test;

use PHPUnit\Framework\TestCase;
use Polynds\BinaryParse\BinaryParse;

/**
 * @internal
 * @coversNothing
 */
class ReaderTest extends TestCase
{
    public function testReadInt8()
    {
        $filename = __DIR__ . '/luac.out';
        $data = BinaryParse::stream($filename);
        $reader = new \Polynds\BinaryParse\Reader($data);
        $this->assertEquals(27,$reader->readInt8());
    }
}
