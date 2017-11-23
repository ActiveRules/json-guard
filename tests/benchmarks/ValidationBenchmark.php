<?php

namespace Activerules\JsonGuard\Bench;

use Activerules\JsonReference\Dereferencer;
use Activerules\JsonGuard\Validator;

/**
 * @Groups({"validation"})
 * @Revs(100)
 */
abstract class ValidationBenchmark extends Benchmark
{
    protected $data;

    protected $schema;

    abstract public function getData();

    abstract public function getSchema();

    public function setUp()
    {
        $this->data   = $this->getData();
        $this->schema = Dereferencer::draft4()->dereference($this->getSchema());
    }

    public function benchJsonGuard()
    {
        (new Validator($this->data, $this->schema))->errors();
    }
}
