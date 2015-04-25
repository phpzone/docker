<?php

namespace spec\PhpZone\Docker\Config\Definition;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ParentResolverSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('PhpZone\Docker\Config\Definition\ParentResolver');
    }

    public function it_should_resolve_multi_inheritance()
    {
        $definitions = array(
            'one' => array(
                'name'    => 'test_name',
                'command' => 'up',
                'scale'   => array(
                    'web' => 2,
                ),
            ),
            'two' => array(
                'parent' => 'one',
                'file'   => 'test_file.yml',
            ),
            'three' => array(
                'parent'  => 'two',
                'command' => 'stop',
                'scale'   => array(
                    'worker' => 3,
                ),
            ),
        );

        $this->resolve($definitions)->shouldBeLike(array(
            'one' => array(
                'name'    => 'test_name',
                'command' => 'up',
                'scale'   => array(
                    'web' => 2,
                ),
            ),
            'two' => array(
                'name'    => 'test_name',
                'command' => 'up',
                'scale'   => array(
                    'web' => 2,
                ),
                'file'    => 'test_file.yml',
            ),
            'three' => array(
                'name'    => 'test_name',
                'command' => 'stop',
                'scale'   => array(
                    'worker' => 3,
                ),
                'file'    => 'test_file.yml',
            ),
        ));
    }
}
