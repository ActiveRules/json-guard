<?php

namespace Activerules\JsonGuard;

interface ConstraintInterface
{
    /**
     * @param mixed $value
     * @param mixed $parameter
     * @param Validator $validator
     *
     * @return \Activerules\JsonGuard\ValidationError|null
     *
     * @throws \Activerules\JsonGuard\Exception\InvalidSchemaException
     */
    public function validate($value, $parameter, Validator $validator);
}
