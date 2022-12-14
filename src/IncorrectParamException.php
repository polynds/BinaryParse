<?php

declare(strict_types=1);
/**
 * happy coding!!!
 */
namespace Polynds\BinaryParse;

use InvalidArgumentException;

class IncorrectParamException extends InvalidArgumentException
{
    public static function create(string $message = '', int $code = 0): IncorrectParamException
    {
        return new self($message, $code);
    }
}
