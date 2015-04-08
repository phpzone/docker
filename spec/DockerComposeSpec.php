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

    public function it_should_implement_phpzone_extension()
    {
        $this->shouldImplement('PhpZone\PhpZone\Extension\Extension');
    }
}
