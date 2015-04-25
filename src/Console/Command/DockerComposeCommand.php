<?php

namespace PhpZone\Docker\Console\Command;

use PhpZone\Docker\Console\Script\Builder\Builder as ScriptBuilder;
use PhpZone\Shell\Console\Command\ScriptCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class DockerComposeCommand extends Command
{
    /** @var array */
    private $scriptOptions;

    /** @var ScriptBuilder */
    private $scriptBuilder;

    /** @var bool */
    private $enabled = true;

    /**
     * @param string $name
     * @param array $options
     */
    public function __construct($name, array $options, ScriptBuilder $scriptBuilder)
    {
        $this->scriptBuilder = $scriptBuilder;

        if (!empty($options['description'])) {
            $this->setDescription($options['description']);
        }

        if (isset($options['enable'])) {
            $this->enabled = $options['enable'];
        }

        if (!empty($options['help'])) {
            $this->setHelp($options['help']);
        }

        $this->scriptOptions = $options;

        parent::__construct($name);
    }

    protected function configure()
    {
        $this->addOption(
            '--no-tty',
            null,
            InputOption::VALUE_NONE,
            'Disable TTY mode'
        );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $inputParameters = array(
            '--no-tty' => false
        );

        if ($input->getOption('no-tty')) {
            $inputParameters['--no-tty'] = $input->getOption('no-tty');
        }

        $uniqueId = uniqid($this->getName() . ':');

        $inputParameters['command'] = $uniqueId;

        $script = $this->scriptBuilder->build($this->scriptOptions);

        $command = new ScriptCommand($uniqueId, $script);
        $command->setApplication($this->getApplication());
        $exitCode = $command->run(new ArrayInput($inputParameters), $output);

        return $exitCode;
    }

    /**
     * @return bool
     */
    public function isEnabled()
    {
        return $this->enabled;
    }
}
