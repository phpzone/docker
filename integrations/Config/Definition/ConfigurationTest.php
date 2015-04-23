<?php

namespace PhpZone\Docker\Integration\Config\Definition;

use PhpZone\Docker\Config\Definition\Configuration;
use Symfony\Component\Config\Definition\Processor;

class ConfigurationTest extends \PHPUnit_Framework_TestCase
{
    public function test_it_should_properly_parse_configuration()
    {
        $configTest = array(
            'command:1' => array(
                'description' => 'description_value',
                'command'     => 'up',
                'file'        => 'docker-compose.yml',
                'name'        => 'instances',
            ),
            0 => array(
                'id'          => 'command:2',
                'description' => 'description_value',
                'command'     => 'up',
                'file'        => 'docker-compose.yml',
                'name'        => 'instances',
            ),
        );

        $configs = array($configTest);

        $processor = new Processor();
        $configuration = new Configuration();
        $processedConfiguration = $processor->processConfiguration($configuration, $configs);

        expect($processedConfiguration)->shouldBeLike(array(
            'command:1' => array(
                'description' => 'description_value',
                'command'     => 'up',
                'file'        => 'docker-compose.yml',
                'name'        => 'instances',
            ),
            'command:2' => array(
                'description' => 'description_value',
                'command'     => 'up',
                'file'        => 'docker-compose.yml',
                'name'        => 'instances',
            ),
        ));
    }
}
