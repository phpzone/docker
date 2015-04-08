<?php

namespace spec\PhpZone\Docker\Command;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\Process\Process;

class DockerComposeCommandSpec extends ObjectBehavior
{
    public function let(Process $process)
    {
        $this->beConstructedWith('command:test', $process);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType('PhpZone\Docker\Command\DockerComposeCommand');
    }

    public function it_should_extend_symfony_command()
    {
        $this->shouldHaveType('Symfony\Component\Console\Command\Command');
    }

    public function it_should_have_name_when_name_given()
    {
        $this->getName()->shouldBeLike('command:test');
    }

    public function it_should_have_process_when_process_given(Process $process)
    {
        $this->getProcess()->shouldBeLike($process);
    }
}
