<?php

namespace PhpZone\Docker\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Process\Process;

class DockerComposeCommand extends Command
{
    /** @var Process */
    private $process;

    /**
     * @param string $name
     * @param string $description
     * @param Process $process
     */
    public function __construct($name, $description, Process $process)
    {
        $this->process = $process;

        $this->setDescription($description);

        parent::__construct($name);
    }

    /**
     * @return Process
     */
    public function getProcess()
    {
        return $this->process;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
    }
}