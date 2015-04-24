<?php

namespace PhpZone\Docker\Console\Script\Builder;

interface Builder
{
    /**
     * @param array $options
     *
     * @return string
     */
    public function build(array $options);
}
