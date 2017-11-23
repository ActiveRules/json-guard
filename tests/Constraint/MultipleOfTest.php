<?php

namespace Activerules\JsonGuard\Test\Constraint;

use Activerules\JsonGuard\Constraint\DraftFour\MultipleOf;
use Activerules\JsonGuard\Validator;
use PHPUnit\Framework\TestCase;

class MultipleOfTest extends TestCase
{
    function test_it_works_with_floats()
    {
       $constraint = new MultipleOf();
       $result = $constraint->validate(2.34, 0.01, new Validator((object) [], (object) []));
       $this->assertNull($result);
    }
}
