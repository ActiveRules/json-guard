<?php

namespace Activerules\JsonGuard\Constraint\DraftFour;

use Activerules\JsonGuard;
use Activerules\JsonGuard\Assert;
use Activerules\JsonGuard\ConstraintInterface;
use Activerules\JsonGuard\Validator;
use function Activerules\JsonGuard\error;

final class MaxLength implements ConstraintInterface
{
    const KEYWORD = 'maxLength';

    /**
     * @var string
     */
    private $charset;

    /**
     * @param string $charset
     */
    public function __construct($charset = 'UTF-8')
    {
        $this->charset = $charset;
    }


    /**
     * {@inheritdoc}
     */
    public function validate($value, $parameter, Validator $validator)
    {
        Assert::type($parameter, 'number', self::KEYWORD, $validator->getSchemaPath());
        Assert::nonNegative($parameter, self::KEYWORD, $validator->getSchemaPath());

        if (!is_string($value) || JsonGuard\strlen($value, $this->charset) <= $parameter) {
            return null;
        }

        return error('The string must be less than {parameter} characters long.', $validator);
    }
}
