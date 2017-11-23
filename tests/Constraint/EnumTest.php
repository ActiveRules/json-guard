<?php

namespace Activerules\JsonGuard\Test\Constraint;

use Activerules\JsonGuard\Constraint\DraftFour\Enum;
use Activerules\JsonGuard\Exception\InvalidSchemaException;
use Activerules\JsonGuard\Validator;
use PHPUnit\Framework\TestCase;

class EnumTest extends TestCase
{
    function test_it_throws_when_parameter_is_not_an_array()
    {
        $this->setExpectedException(InvalidSchemaException::class);
        (new Enum())->validate([1,2,3], 'not-array', new Validator([], new \stdClass()));
    }
}
