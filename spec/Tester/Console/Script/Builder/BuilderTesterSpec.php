<?php

namespace spec\PhpZone\Docker\Tester\Console\Script\Builder;

use PhpSpec\ObjectBehavior;
use PhpZone\Docker\Console\Script\Builder\Builder;
use Prophecy\Argument;

class BuilderTesterSpec extends ObjectBehavior
{
    public function let(Builder $builder)
    {
        $this->beConstructedWith($builder);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType('PhpZone\Docker\Tester\Console\Script\Builder\BuilderTester');
    }

    public function it_should_implement_builder()
    {
        $this->shouldImplement('PhpZone\Docker\Console\Script\Builder\Builder');
    }

    public function it_should_return_script_prefixed_by_echo(Builder $builder)
    {
        $builder->build(array('test'))->willReturn('test');

        $this->build(array('test'))->shouldBeLike('echo test');
    }
}
