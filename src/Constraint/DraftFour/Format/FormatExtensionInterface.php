<?php

namespace Activerules\JsonGuard\Constraint\DraftFour\Format;

use Activerules\JsonGuard\Validator;

interface FormatExtensionInterface
{
    /**
     * @param string                      $value The value to validate
     * @param \Activerules\JsonGuard\Validator $validator
     *
     * @return \Activerules\JsonGuard\ValidationError|null A ValidationError if validation fails, otherwise null.
     */
    public function validate($value, Validator $validator);
}
