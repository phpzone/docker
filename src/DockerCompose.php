<?php

namespace PhpZone\Docker;

use PhpZone\PhpZone\Extension\Extension;
use PhpZone\Docker\Process\ProcessFactory;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Process\Process;

class DockerCompose implements Extension
{
    /** @var ContainerBuilder */
    private $container;

    /** @var ProcessFactory */
    private $processFactory;

    /** @var OptionsResolver */
    private $optionsResolver;

    public function load(ContainerBuilder $container)
    {
        $this->container = $container;
        $this->processFactory = new ProcessFactory();

        $this->optionsResolver = new OptionsResolver();
        $this->configureOptions($this->optionsResolver);

        $config = $container->getParameter(get_class($this));

        $this->createAndRegisterDefinitions($config);
    }

    private function configureOptions(OptionsResolver $optionsResolver)
    {
        $optionsResolver->setDefaults(array(
            'description' => null,
            'command'     => 'up',
            'file'        => null,
            'name'        => null,
        ));
    }

    private function createAndRegisterDefinitions(array $config = array())
    {
        foreach ($config as $commandName => $commandOptions) {
            if ($commandOptions === null) {
                $commandOptions = array();
            }

            $definition = $this->generateCommandDefinition($commandName, $commandOptions);

            $this->container->setDefinition('phpzone.docker_compose.' . $commandName, $definition);
        }
    }

    /**
     * @param string $commandName
     * @param array $commandOptions
     *
     * @return Definition
     */
    private function generateCommandDefinition($commandName, array $commandOptions)
    {
        $commandOptions = $this->optionsResolver->resolve($commandOptions);

        $process = $this->generateProcess($commandOptions);

        $definition = new Definition('PhpZone\Docker\Command\DockerComposeCommand');
        $definition->setArguments(
            array($commandName, $commandOptions['description'], $process)
        );
        $definition->addTag('command');

        return $definition;
    }

    /**
     * @param array $commandOptions
     *
     * @return Process
     */
    private function generateProcess(array $commandOptions)
    {
        $arguments = array('docker-compose');

        if ($commandOptions['file']) {
            $arguments[] = '-f';
            $arguments[] = $commandOptions['file'];
        }

        if ($commandOptions['name']) {
            $arguments[] = '-p';
            $arguments[] = $commandOptions['name'];
        }

        $arguments[] = $commandOptions['command'];

        $process = $this->processFactory->createByArguments($arguments);

        return $process;
    }
}
