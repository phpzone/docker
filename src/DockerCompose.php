<?php

namespace PhpZone\Docker;

use PhpZone\Docker\Config\Definition\Configuration;
use PhpZone\PhpZone\Extension\AbstractExtension;
use Symfony\Component\Config\Definition\Processor;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader as ContainerYamlFileLoader;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Process\Process;

class DockerCompose extends AbstractExtension
{
    /** @var ContainerBuilder */
    private $container;

    /** @var OptionsResolver */
    private $optionsResolver;

    public function load(array $config, ContainerBuilder $container)
    {
        $this->container = $container;

        $loader = new ContainerYamlFileLoader($this->container, new FileLocator(__DIR__ . '/../config'));
        $loader->load('services.yml');

        $this->optionsResolver = new OptionsResolver();
        $this->configureOptions($this->optionsResolver);

        $processor = new Processor();
        $configuration = new Configuration();
        $processedConfig = $processor->processConfiguration($configuration, $config);

        $this->createAndRegisterDefinitions($processedConfig);
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

        $definition = new Definition('PhpZone\Docker\Console\Command\DockerComposeCommand');
        $definition->setArguments(
            array($commandName, $commandOptions, new Reference('phpzone.docker.script_builder.docker_compose'))
        );
        $definition->addTag('command');

        return $definition;
    }
}
