<?php

namespace Activerules\JsonGuard\Constraint\DraftFour;

use Activerules\JsonGuard\Assert;
use Activerules\JsonGuard\ConstraintInterface;
use Activerules\JsonGuard\Validator;
use function Activerules\JsonGuard\error;
use function Activerules\JsonGuard\pointer_push;

final class OneOf implements ConstraintInterface
{
    const KEYWORD = 'oneOf';

    /**
     * {@inheritdoc}
     */
    public function validate($value, $parameter, Validator $validator)
    {
        Assert::type($parameter, 'array', self::KEYWORD, $validator->getSchemaPath());
        Assert::notEmpty($parameter, self::KEYWORD, $validator->getSchemaPath());

        $passed = 0;
        foreach ($parameter as $key => $schema) {
            $subValidator = $validator->makeSubSchemaValidator(
                $value,
                $schema,
                $validator->getDataPath(),
                pointer_push($validator->getSchemaPath(), $key)
            );
            if ($subValidator->passes()) {
                $passed++;
            }
        }
        if ($passed !== 1) {
            return error('The data must match exactly one of the schemas.', $validator);
        }

        return null;
    }
}
