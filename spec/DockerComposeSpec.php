<?php

namespace spec\PhpZone\Docker;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DockerComposeSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('PhpZone\Docker\DockerCompose');
    }

    public function it_should_implement_symfony_di_extension()
    {
        $this->shouldImplement('Symfony\Component\DependencyInjection\Extension\ExtensionInterface');
    }
}
