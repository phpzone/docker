<?php

namespace spec\PhpZone\Docker\Console\Script\Builder;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DockerComposeBuilderSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('PhpZone\Docker\Console\Script\Builder\DockerComposeBuilder');
    }

    public function it_should_implement_builder()
    {
        $this->shouldImplement('PhpZone\Docker\Console\Script\Builder\Builder');
    }

    public function it_should_build_script_when_command_given()
    {
        $options = array(
            'command' => 'up',
        );

        $this->build($options)->shouldBeLike('docker-compose up');
    }
}
