<?php

namespace Activerules\JsonGuard\Test\Constraint;

use Activerules\JsonGuard\Constraint\DraftFour\MinLength;
use Activerules\JsonGuard\ValidationError;
use Activerules\JsonGuard\Validator;
use PHPUnit\Framework\TestCase;

class MinLengthTest extends TestCase
{
    function test_it_validates_multibyte_string_length_correctly()
    {
        $value      = '按时间先后进行排序';
        $constraint = new MinLength();
        $validator  = new Validator((object) [], (object) []);
        $this->assertNull($constraint->validate($value, 9, $validator));
        $this->assertInstanceOf(ValidationError::class, $constraint->validate($value, 10, $validator));
    }
}
