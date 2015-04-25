<?php

namespace PhpZone\Docker\Console\Script\Builder;

class DockerComposeBuilder implements Builder
{
    /** @var array */
    private $allowedCommands = array(
        'build', 'kill', 'logs', 'port', 'ps', 'pull', 'rm', 'scale', 'start', 'stop', 'up'
    );

    /**
     * @param array $options
     *
     * @throws \InvalidArgumentException
     *
     * @return string
     */
    public function build(array $options)
    {
        if (empty($options['command'])) {
            throw new \InvalidArgumentException('The "command" definition is mandatory', 1);
        }

        if (!in_array($options['command'], $this->allowedCommands)) {
            throw new \InvalidArgumentException(
                sprintf('"%s" is not the allowed "command" definition', $options['command']),
                1
            );
        }

        $script = array('docker-compose');

        $this->setUpOptions($script, $options);

        $script[] = $options['command'];

        $this->setUpCommandSpecificArguments($script, $options);

        return implode(' ', $script);
    }

    /**
     * @param array $script
     * @param array $options
     */
    private function setUpOptions(array &$script, array $options)
    {
        if (!empty($options['file'])) {
            $script[] = '-f';
            $script[] = $options['file'];
        }

        if (!empty($options['name'])) {
            $script[] = '-p';
            $script[] = $options['name'];
        }

        if (!empty($options['verbose']) && $options['verbose'] === true) {
            $script[] = '--verbose';
        }
    }

    /**
     * @param array $script
     * @param array $options
     */
    private function setUpCommandSpecificArguments(array &$script, array $options)
    {
        if ($options['command'] === 'build' && !empty($options['build'])) {
            $this->setUpBuildCommandArguments($script, $options['build']);
        }

        if ($options['command'] === 'rm' && !empty($options['rm'])) {
            $this->setUpRmCommandArguments($script, $options['rm']);
        }

        if ($options['command'] === 'scale' && !empty($options['scale'])) {
            $this->setUpScaleCommandArguments($script, $options['scale']);
        }

        if ($options['command'] === 'up' && !empty($options['up'])) {
            $this->setUpUpCommandArguments($script, $options['up']);
        }
    }

    /**
     * @param array $script
     * @param array $arguments
     */
    private function setUpBuildCommandArguments(array &$script, array $arguments)
    {
        if (!empty($arguments['no_cache']) && $arguments['no_cache'] === true) {
            $script[] = '--no-cache';
        }
    }

    /**
     * @param array $script
     * @param array $arguments
     */
    private function setUpRmCommandArguments(array &$script, array $arguments)
    {
        if (!empty($arguments['force']) && $arguments['force'] === true) {
            $script[] = '--force';
        }
    }

    /**
     * @param array $script
     * @param array $arguments
     */
    private function setUpScaleCommandArguments(array &$script, array $arguments)
    {
        foreach ($arguments as $container => $count) {
            $script[] = $container . '=' . $count;
        }
    }

    /**
     * @param array $script
     * @param array $arguments
     */
    private function setUpUpCommandArguments(array &$script, array $arguments)
    {
        if (!empty($arguments['daemon']) && $arguments['daemon'] === true) {
            $script[] = '-d';
        }

        if (!empty($arguments['no_recreate']) && $arguments['no_recreate'] === true) {
            $script[] = '--no-recreate';
        }

        if (!empty($arguments['no_build']) && $arguments['no_build'] === true) {
            $script[] = '--no-build';
        }
    }
}
