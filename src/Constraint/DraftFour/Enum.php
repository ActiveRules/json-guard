<?php

namespace Activerules\JsonGuard\Constraint\DraftFour;

use Activerules\JsonGuard\Assert;
use Activerules\JsonGuard\ConstraintInterface;
use Activerules\JsonGuard\Validator;
use function Activerules\JsonGuard\error;

final class Enum implements ConstraintInterface
{
    const KEYWORD = 'enum';

    /**
     * {@inheritdoc}
     */
    public function validate($value, $parameter, Validator $validator)
    {
        Assert::type($parameter, 'array', self::KEYWORD, $validator->getSchemaPath());

        if (is_object($value)) {
            foreach ($parameter as $i) {
                if (is_object($i) && $value == $i) {
                    return null;
                }
            }
        } else {
            if (in_array($value, $parameter, true)) {
                return null;
            }
        }

        return error('The value must be one of: {parameter}', $validator);
    }
}
