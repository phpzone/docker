<?php

namespace PhpZone\Docker\Tester\Console\Script\Builder;

use PhpZone\Docker\Console\Script\Builder\Builder;

class BuilderTester implements Builder
{
    /** @var Builder */
    private $builder;

    public function __construct(Builder $builder)
    {
        $this->builder = $builder;
    }

    /**
     * @param array $options
     *
     * @return string
     */
    public function build(array $options)
    {
        return 'echo ' . $this->builder->build($options);
    }
}
