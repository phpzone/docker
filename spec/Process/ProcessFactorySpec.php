<?php

namespace spec\PhpZone\Docker\Process;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ProcessFactorySpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('PhpZone\Docker\Process\ProcessFactory');
    }

    public function it_should_create_process_when_arguments_given()
    {
        $arguments = array('ls', '-la');

        $process = $this->createByArguments($arguments);

        $process->shouldHaveType('Symfony\Component\Process\Process');
        $process->getCommandLine()->shouldBeLike("'ls' '-la'");
    }
}
