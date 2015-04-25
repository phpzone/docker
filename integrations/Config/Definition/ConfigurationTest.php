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
                'verbose'     => true,
                'build'       => array(
                    'no-cache' => true,
                ),
                'rm'          => array(
                    'force' => true,
                ),
                'scale'       => array(
                    'web'    => 2,
                    'worker' => 3,
                ),
                'up'          => array(
                    'daemon'      => true,
                    'no-recreate' => true,
                    'no-build'    => true,
                ),
                'enable'      => false,
                'help'        => 'help_value',
                'parent'      => 'command:2',
            ),
            0 => array(
                'id'          => 'command:2',
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
                'verbose'     => true,
                'build'       => array(
                    'no_cache' => true,
                ),
                'rm'          => array(
                    'force' => true,
                ),
                'scale'       => array(
                    'web'    => 2,
                    'worker' => 3,
                ),
                'up'          => array(
                    'daemon'      => true,
                    'no_recreate' => true,
                    'no_build'    => true,
                ),
                'enable'      => false,
                'help'        => 'help_value',
                'parent'      => 'command:2',
            ),
            'command:2' => array(
                'scale' => array(),
            ),
        ));
    }
}
