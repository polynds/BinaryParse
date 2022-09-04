#!/usr/bin/env php
<?php

use Polynds\BinaryParse\Binary;

require_once __DIR__ . '/../vendor/autoload.php';
//
//echo sprintf('\\x%x', 27);
//exit();

$filename = __DIR__ . '/luac.out';
$data = Binary::stream($filename);


var_dump(0x53==83);

$reader = new \Polynds\BinaryParse\Reader($data);
var_dump(\Polynds\BinaryParse\ByteOrder::checkOrder());
var_dump(ascll2Str([
    $reader->readUInt8(),
    $reader->readUInt8(),
    $reader->readUInt8(),
    $reader->readUInt8(),
]));
var_dump($reader->readUInt8());
var_dump($reader->readUInt8());


function hex2bin2($h)
{
    if (! is_string($h)) {
        return null;
    }
    $r = '';
    for ($i = 0; $i < strlen($h); $i += 2) {
        $hex = ($i == 0 ? '\\x' : '') . $h[$i] . $h[($i + 1)];
//        var_dump($hex, ord($hex));
        if ($hex >= 0x21 && $hex <= 0x7E) {
            $r .= chr(hexdec($hex));
        } else {
            $r .= $hex;
        }
    }
    return $r;
}

function ascll2Str(array $bytes): string
{
    $str = '';
    foreach ($bytes as $byte) {
        if ($byte >= 33 && $byte <= 126) {
            $str .= chr($byte);
        } else {
            $str .= sprintf('\\x%x', $byte);
        }
    }
    return $str;
}
