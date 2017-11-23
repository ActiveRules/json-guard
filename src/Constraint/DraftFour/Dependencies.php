<?php

namespace Activerules\JsonGuard\Constraint\DraftFour;

use Activerules\JsonGuard\Assert;
use Activerules\JsonGuard\ConstraintInterface;
use Activerules\JsonGuard\Validator;
use function Activerules\JsonGuard\error;
use function Activerules\JsonGuard\pointer_push;

final class Dependencies implements ConstraintInterface
{
    const KEYWORD = 'dependencies';

    /**
     * {@inheritdoc}
     */
    public function validate($value, $parameter, Validator $validator)
    {
        Assert::type($parameter, ['object', 'array'], self::KEYWORD, $validator->getSchemaPath());

        $errors = [];
        foreach ($parameter as $property => $dependencies) {
            if (!is_object($value) || !property_exists($value, $property)) {
                continue;
            }

            if (is_array($dependencies)) {
                $errors = array_merge(
                    $errors,
                    array_filter(array_map(function ($dependency) use ($value, $validator) {
                        if (!in_array($dependency, array_keys(get_object_vars($value)), true)) {
                            return error('The object must contain the dependent property {cause}.', $validator)
                                ->withCause($dependency);
                        }
                    }, $dependencies))
                );
            } elseif (is_object($dependencies)) {
                $errors = array_merge(
                    $errors,
                    $validator->makeSubSchemaValidator(
                        $value,
                        $dependencies,
                        $validator->getDataPath(),
                        pointer_push($validator->getSchemaPath(), $property)
                    )->errors()
                );
            }
        }

        return $errors;
    }
}
