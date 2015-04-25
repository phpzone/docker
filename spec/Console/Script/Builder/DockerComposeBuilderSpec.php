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

    public function it_should_fail_when_not_allowed_command_given()
    {
        $options = array(
            'command' => 'not_allowed',
        );

        $this->shouldThrow('\InvalidArgumentException')->during('build', array($options));
    }

    public function it_should_fail_when_no_command_given()
    {
        $options = array();

        $this->shouldThrow('\InvalidArgumentException')->during('build', array($options));
    }

    public function it_should_build_build_command()
    {
        $options = array(
            'command' => 'build'
        );

        $this->build($options)->shouldBeLike('docker-compose build');
    }

    public function it_should_build_build_command_with_no_cache_option()
    {
        $options = array(
            'command' => 'build',
            'build'   => array (
                'no_cache' => true,
            ),
        );

        $this->build($options)->shouldBeLike('docker-compose build --no-cache');
    }

    public function it_should_build_kill_command()
    {
        $options = array(
            'command' => 'kill'
        );

        $this->build($options)->shouldBeLike('docker-compose kill');
    }

    public function it_should_build_logs_command()
    {
        $options = array(
            'command' => 'logs'
        );

        $this->build($options)->shouldBeLike('docker-compose logs');
    }

    public function it_should_build_port_command()
    {
        $options = array(
            'command' => 'port'
        );

        $this->build($options)->shouldBeLike('docker-compose port');
    }

    public function it_should_build_ps_command()
    {
        $options = array(
            'command' => 'ps'
        );

        $this->build($options)->shouldBeLike('docker-compose ps');
    }

    public function it_should_build_pull_command()
    {
        $options = array(
            'command' => 'pull'
        );

        $this->build($options)->shouldBeLike('docker-compose pull');
    }

    public function it_should_build_rm_command()
    {
        $options = array(
            'command' => 'rm'
        );

        $this->build($options)->shouldBeLike('docker-compose rm');
    }

    public function it_should_build_rm_command_with_force_option()
    {
        $options = array(
            'command' => 'rm',
            'rm'      => array(
                'force'   => true,
            ),
        );

        $this->build($options)->shouldBeLike('docker-compose rm --force');
    }

    public function it_should_build_scale_command()
    {
        $options = array(
            'command' => 'scale',
            'scale' => array(
                'web'    => 2,
                'worker' => 3,
            ),
        );

        $this->build($options)->shouldBeLike('docker-compose scale web=2 worker=3');
    }

    public function it_should_build_start_command()
    {
        $options = array(
            'command' => 'start'
        );

        $this->build($options)->shouldBeLike('docker-compose start');
    }

    public function it_should_build_stop_command()
    {
        $options = array(
            'command' => 'stop'
        );

        $this->build($options)->shouldBeLike('docker-compose stop');
    }

    public function it_should_build_up_command()
    {
        $options = array(
            'command' => 'up'
        );

        $this->build($options)->shouldBeLike('docker-compose up');
    }

    public function it_should_build_up_command_with_daemon_option()
    {
        $options = array(
            'command' => 'up',
            'up'      => array(
                'daemon' => true,
            ),
        );

        $this->build($options)->shouldBeLike('docker-compose up -d');
    }

    public function it_should_build_up_command_with_no_recreate()
    {
        $options = array(
            'command' => 'up',
            'up'      => array(
                'no_recreate' => true,
            ),
        );

        $this->build($options)->shouldBeLike('docker-compose up --no-recreate');
    }

    public function it_should_build_up_command_with_no_build()
    {
        $options = array(
            'command' => 'up',
            'up'      => array(
                'no_build' => true,
            ),
        );

        $this->build($options)->shouldBeLike('docker-compose up --no-build');
    }

    public function it_should_build_script_with_verbose_option()
    {
        $options = array(
            'command' => 'up',
            'verbose' => true,
        );

        $this->build($options)->shouldBeLike('docker-compose --verbose up');
    }

    public function it_should_build_script_with_file_option()
    {
        $options = array(
            'command' => 'up',
            'file'    => 'docker-compose.yml',
        );

        $this->build($options)->shouldBeLike('docker-compose -f docker-compose.yml up');
    }

    public function it_should_build_script_with_project_name_option()
    {
        $options = array(
            'command' => 'up',
            'name'    => 'testname',
        );

        $this->build($options)->shouldBeLike('docker-compose -p testname up');
    }
}
