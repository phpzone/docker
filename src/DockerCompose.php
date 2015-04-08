<?php

namespace PhpZone\Docker;

use PhpZone\PhpZone\Extension\Extension;
use PhpZone\Shell\Process\ProcessFactory;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\OptionsResolver\OptionsResolver;

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
    }

    private function configureOptions(OptionsResolver $optionsResolver)
    {

    }
}
