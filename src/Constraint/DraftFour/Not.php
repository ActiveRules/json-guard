<?php

namespace Activerules\JsonGuard\Constraint\DraftFour;

use Activerules\JsonGuard\Assert;
use Activerules\JsonGuard\ConstraintInterface;
use Activerules\JsonGuard\Validator;
use function Activerules\JsonGuard\error;

final class Not implements ConstraintInterface
{
    const KEYWORD = 'not';

    /**
     * {@inheritdoc}
     */
    public function validate($value, $parameter, Validator $validator)
    {
        Assert::type($parameter, 'object', self::KEYWORD, $validator->getSchemaPath());

        $subValidator = $validator->makeSubSchemaValidator($value, $parameter);
        if ($subValidator->passes()) {
            return error('The data must not match the schema.', $validator);
        }
        return null;
    }
}
