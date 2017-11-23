<?php

namespace Activerules\JsonGuard\Test\RuleSet;

use Activerules\JsonGuard\Exception\ConstraintNotFoundException;
use Activerules\JsonGuard\RuleSet\DraftFour;
use PHPUnit\Framework\TestCase;

class DraftFourRuleSetTest extends TestCase
{
    function test_has()
    {
        $ruleSet = new DraftFour();
        $this->assertTrue($ruleSet->has('allOf'));
        $this->assertFalse($ruleSet->has('nonExistent'));
    }

    function test_get_constraint_when_constraint_does_not_exist_throws()
    {
        $this->setExpectedException(ConstraintNotFoundException::class);
        $ruleSet = new DraftFour();
        $ruleSet->get('nonExistent');
    }
}
