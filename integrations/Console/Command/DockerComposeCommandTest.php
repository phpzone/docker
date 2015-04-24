<?php

namespace PhpZone\Docker\Integration\Console\Command;

use PhpZone\Docker\Console\Command\DockerComposeCommand;
use PhpZone\Docker\Console\Script\Builder\DockerComposeBuilder;
use PhpZone\Docker\Tester\Console\Script\Builder\BuilderTester;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;

class DockerComposeCommandTest extends \PHPUnit_Framework_TestCase
{
    public function test_it_should_run_process()
    {
        $options = array(
            'command' => 'up',
            'file'    => null,
            'name'    => null,
        );
        $testerBuilder = new BuilderTester(new DockerComposeBuilder());

        $command = new DockerComposeCommand('test', $options, $testerBuilder);

        $application = new Application();
        $application->add($command);

        $commandTester = new CommandTester($command);
        $commandTester->execute(array(
            'command'  => 'test',
            '--no-tty' => true,
        ));

        expect(trim($commandTester->getDisplay()))->toBe('docker-compose up');
    }

    public function test_it_should_fail_when_some_of_script_fail_given()
    {
        $options = array(
            'command' => 'up',
            'file'    => null,
            'name'    => null,
        );
        $testerBuilder = $this->getMock('PhpZone\Docker\Console\Script\Builder\DockerComposeBuilder');
        $testerBuilder->expects($this->once())
            ->method('build')
            ->willReturn('php -r "exit(1);"')
        ;

        $command = new DockerComposeCommand('test', $options, $testerBuilder);

        $application = new Application();
        $application->add($command);

        $commandTester = new CommandTester($command);
        $exitCode = $commandTester->execute(array(
            'command'  => 'test',
        ));

        expect($exitCode)->toBe(1);
    }
}
