<?php

namespace Activerules\JsonGuard\Constraint\DraftFour;

use Activerules\JsonGuard\Assert;
use Activerules\JsonGuard\ConstraintInterface;
use Activerules\JsonGuard\Validator;
use function Activerules\JsonGuard\error;

final class Minimum implements ConstraintInterface
{
    const KEYWORD = 'minimum';

    /**
     * @var int|null
     */
    private $precision;

    /**
     * @param int|null $precision
     */
    public function __construct($precision = 10)
    {
        $this->precision = $precision;
    }

    /**
     * {@inheritdoc}
     */
    public function validate($value, $parameter, Validator $validator)
    {
        Assert::type($parameter, 'number', self::KEYWORD, $validator->getSchemaPath());

        if (isset($validator->getSchema()->exclusiveMinimum) && $validator->getSchema()->exclusiveMinimum === true) {
            return null;
        }

        if (!is_numeric($value) ||
            bccomp($value, $parameter, $this->precision) === 1 || bccomp($value, $parameter, $this->precision) === 0) {
            return null;
        }

        return error('The number must be at least {parameter}.', $validator);
    }
}
