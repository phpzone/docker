<?php

namespace spec\PhpZone\Docker\Console\Command;

use PhpSpec\ObjectBehavior;
use PhpZone\Docker\Console\Script\Builder\Builder;
use Prophecy\Argument;

class DockerComposeCommandSpec extends ObjectBehavior
{
    public function let(Builder $builder)
    {
        $options = array(
            'description' => 'test description',
        );

        $this->beConstructedWith('command:test', $options, $builder);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType('PhpZone\Docker\Console\Command\DockerComposeCommand');
    }

    public function it_should_extend_symfony_command()
    {
        $this->shouldHaveType('Symfony\Component\Console\Command\Command');
    }

    public function it_should_have_name_when_name_given()
    {
        $this->getName()->shouldBeLike('command:test');
    }

    public function it_should_have_description_when_description_given()
    {
        $this->getDescription()->shouldBeLike('test description');
    }
}
