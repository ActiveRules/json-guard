<?php

namespace Activerules\JsonGuard\Constraint\DraftFour;

use Activerules\JsonGuard;
use Activerules\JsonGuard\Assert;
use Activerules\JsonGuard\ConstraintInterface;
use Activerules\JsonGuard\Validator;
use function Activerules\JsonGuard\error;

final class Pattern implements ConstraintInterface
{
    const KEYWORD = 'pattern';

    /**
     * {@inheritdoc}
     */
    public function validate($value, $parameter, Validator $validator)
    {
        Assert::type($parameter, 'string', self::KEYWORD, $validator->getSchemaPath());

        if (!is_string($value)) {
            return null;
        }

        if (preg_match(JsonGuard\delimit_pattern($parameter), $value) === 1) {
            return null;
        }

        return error('The string must match the pattern {parameter}.', $validator);
    }
}
