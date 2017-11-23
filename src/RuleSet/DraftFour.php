<?php

namespace Activerules\JsonGuard\RuleSet;

use Activerules\JsonGuard\Constraint\DraftFour\AdditionalItems;
use Activerules\JsonGuard\Constraint\DraftFour\AdditionalProperties;
use Activerules\JsonGuard\Constraint\DraftFour\AllOf;
use Activerules\JsonGuard\Constraint\DraftFour\AnyOf;
use Activerules\JsonGuard\Constraint\DraftFour\Dependencies;
use Activerules\JsonGuard\Constraint\DraftFour\Enum;
use Activerules\JsonGuard\Constraint\DraftFour\ExclusiveMaximum;
use Activerules\JsonGuard\Constraint\DraftFour\ExclusiveMinimum;
use Activerules\JsonGuard\Constraint\DraftFour\Format;
use Activerules\JsonGuard\Constraint\DraftFour\Items;
use Activerules\JsonGuard\Constraint\DraftFour\Maximum;
use Activerules\JsonGuard\Constraint\DraftFour\MaxItems;
use Activerules\JsonGuard\Constraint\DraftFour\MaxLength;
use Activerules\JsonGuard\Constraint\DraftFour\MaxProperties;
use Activerules\JsonGuard\Constraint\DraftFour\Minimum;
use Activerules\JsonGuard\Constraint\DraftFour\MinItems;
use Activerules\JsonGuard\Constraint\DraftFour\MinLength;
use Activerules\JsonGuard\Constraint\DraftFour\MinProperties;
use Activerules\JsonGuard\Constraint\DraftFour\MultipleOf;
use Activerules\JsonGuard\Constraint\DraftFour\Not;
use Activerules\JsonGuard\Constraint\DraftFour\OneOf;
use Activerules\JsonGuard\Constraint\DraftFour\Pattern;
use Activerules\JsonGuard\Constraint\DraftFour\PatternProperties;
use Activerules\JsonGuard\Constraint\DraftFour\Properties;
use Activerules\JsonGuard\Constraint\DraftFour\Required;
use Activerules\JsonGuard\Constraint\DraftFour\Type;
use Activerules\JsonGuard\Constraint\DraftFour\UniqueItems;

/**
 * The default rule set for JSON Schema Draft 4.
 * @see http://tools.ietf.org/html/draft-zyp-json-schema-04
 * @see  https://tools.ietf.org/html/draft-fge-json-schema-validation-00
 */
final class DraftFour extends RuleSetContainer
{
    const DEFAULT_RULES = [
        AdditionalItems::KEYWORD      => AdditionalItems::class,
        AdditionalProperties::KEYWORD => AdditionalProperties::class,
        AllOf::KEYWORD                => AllOf::class,
        Anyof::KEYWORD                => AnyOf::class,
        Dependencies::KEYWORD         => Dependencies::class,
        Enum::KEYWORD                 => Enum::class,
        ExclusiveMaximum::KEYWORD     => ExclusiveMaximum::class,
        ExclusiveMinimum::KEYWORD     => ExclusiveMinimum::class,
        Format::KEYWORD               => Format::class,
        Items::KEYWORD                => Items::class,
        Maximum::KEYWORD              => Maximum::class,
        MaxItems::KEYWORD             => MaxItems::class,
        MaxLength::KEYWORD            => MaxLength::class,
        MaxProperties::KEYWORD        => MaxProperties::class,
        Minimum::KEYWORD              => Minimum::class,
        MinItems::KEYWORD             => MinItems::class,
        MinLength::KEYWORD            => MinLength::class,
        MinProperties::KEYWORD        => MinProperties::class,
        MultipleOf::KEYWORD           => MultipleOf::class,
        Not::KEYWORD                  => Not::class,
        OneOF::KEYWORD                => OneOf::class,
        Pattern::KEYWORD              => Pattern::class,
        PatternProperties::KEYWORD    => PatternProperties::class,
        Properties::KEYWORD           => Properties::class,
        Required::KEYWORD             => Required::class,
        Type::KEYWORD                 => Type::class,
        UniqueItems::KEYWORD          => UniqueItems::class,
    ];

    public function __construct(array $rules = [])
    {
        parent::__construct(array_merge(self::DEFAULT_RULES, $rules));
    }
}
