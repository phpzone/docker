<?php

namespace PhpZone\Docker\Process;

use Symfony\Component\Process\Process;
use Symfony\Component\Process\ProcessBuilder;

class ProcessFactory
{
    /**
     * @param array $arguments
     *
     * @return Process
     */
    public function createByArguments(array $arguments)
    {
        $processBuilder = new ProcessBuilder($arguments);

        return $processBuilder->getProcess();
    }
}
