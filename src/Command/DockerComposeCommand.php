<?php

namespace PhpZone\Docker\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Process\Process;

class DockerComposeCommand extends Command
{

    private $process;

    /**
     * @param string $name
     * @param Process $process
     */
    public function __construct($name, Process $process)
    {
        $this->process = $process;

        parent::__construct($name);
    }

    /**
     * @return Process
     */
    public function getProcess()
    {
        return $this->process;
    }
}
