<?php

namespace Activerules\JsonGuard\Constraint\DraftFour;

use Activerules\JsonGuard\Assert;
use Activerules\JsonGuard\ConstraintInterface;
use Activerules\JsonGuard\ValidationError;
use Activerules\JsonGuard\Validator;
use function Activerules\JsonGuard\error;

final class Type implements ConstraintInterface
{
    const KEYWORD = 'type';

    /**
     * {@inheritdoc}
     */
    public function validate($value, $type, Validator $validator)
    {
        Assert::type($type, ['array', 'string'], self::KEYWORD, $validator->getSchemaPath());

        if (is_array($type)) {
            return $this->anyType($value, $type, $validator);
        }

        switch ($type) {
            case 'object':
                return $this->validateType($value, 'is_object', $validator);
            case 'array':
                return $this->validateType($value, 'is_array', $validator);
            case 'boolean':
                return $this->validateType($value, 'is_bool', $validator);
            case 'null':
                return $this->validateType($value, 'is_null', $validator);
            case 'number':
                return $this->validateType(
                    $value,
                    'Activerules\JsonGuard\is_json_number',
                    $validator
                );
            case 'integer':
                return $this->validateType(
                    $value,
                    'Activerules\JsonGuard\is_json_integer',
                    $validator
                );
            case 'string':
                return $this->validateType($value, 'is_string', $validator);
        }
    }

    /**
     * @param mixed                       $value
     * @param callable                    $callable
     * @param \Activerules\JsonGuard\Validator $validator
     *
     * @return \Activerules\JsonGuard\ValidationError|null
     *
     */
    private function validateType($value, callable $callable, Validator $validator)
    {
        if (call_user_func($callable, $value) === true) {
            return null;
        }

        return error('The data must be a(n) {parameter}.', $validator);
    }

    /**
     * @param mixed $value
     * @param array $choices
     *
     * @param Validator $validator
     *
     * @return ValidationError|null
     */
    private function anyType($value, array $choices, Validator $validator)
    {
        foreach ($choices as $type) {
            $error = $this->validate($value, $type, $validator);
            if (is_null($error)) {
                return null;
            }
        }

        return error('The data must be one of {parameter}.', $validator);
    }
}
