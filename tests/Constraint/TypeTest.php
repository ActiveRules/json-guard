<?php

namespace Activerules\JsonGuard\Test\Constraint;

use Activerules\JsonGuard\Constraint\DraftFour\Type;
use Activerules\JsonGuard\ValidationError;
use Activerules\JsonGuard\Validator;
use PHPUnit\Framework\TestCase;

class TypeTest extends TestCase
{
    function test_numeric_string_is_not_a_number()
    {
        $type = new Type();

        $error = $type->validate('1', 'number', new Validator([], new \stdClass()));

        $this->assertInstanceOf(ValidationError::class, $error);
    }

    function test_numeric_string_is_a_string()
    {
        $type = new Type();

        $error = $type->validate('9223372036854775999', 'string', new Validator([], new \stdClass()));

        $this->assertNull($error);
    }
}
