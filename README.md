# PhpZone Docker
        
[![Build Status](https://travis-ci.org/phpzone/docker.svg?branch=master)](https://travis-ci.org/phpzone/docker)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/phpzone/docker/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/phpzone/docker/?branch=master)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/770e3dd1-7d5c-40f7-9ae8-15aa64eb5022/mini.png)](https://insight.sensiolabs.com/projects/770e3dd1-7d5c-40f7-9ae8-15aa64eb5022)

[![Latest Stable Version](https://poser.pugx.org/phpzone/docker/v/stable.png)](https://packagist.org/packages/phpzone/docker)
[![Total Downloads](https://poser.pugx.org/phpzone/docker/downloads.png)](https://packagist.org/packages/phpzone/docker)
[![License](https://poser.pugx.org/phpzone/docker/license.png)](https://packagist.org/packages/phpzone/docker)

A Docker command builder configured by [YAML], based on [PhpZone]. Its primary purpose is to
provide a simple way to define commands for running Docker containers/instances which could be used in daily workflow
of every developer. Since now not all developers need to have a knowledge about Docker but still everyone can simply
understand what is running. It is not only about the knowledge but also experienced developers can find an advantage
in keeping ready-made commands.

**This tool is only a configurator and executor of Docker commands, so to make it working you must have installed
[Docker] and [Docker Compose] your own.**

## Basic Usage

An example speaks a hundred words so let’s go through one.

The configuration file below is used for the development of this extension:

Create a `phpzone.yml` file in the root of a project:

```yaml
extensions:
    PhpZone\Docker\DockerCompose: # register an extension with a configuration
        db:
            description: Run DB which can be used for running tests
            name: myproject
            file: docker-compose.yml
            command: up
```

and run:

```bash
$ vendor/bin/phpzone db
```

This will compose a proper Docker Compose command and execute it.

## Documentation

For more details visit [PhpZone Docker documentation].


[YAML]: http://symfony.com/doc/current/components/yaml/yaml_format.html
[PhpZone]: https://github.com/phpzone/phpzone
[Docker]: https://docs.docker.com
[Docker Compose]: https://docs.docker.com/compose
[PhpZone Docker documentation]: http://www.phpzone.org/projects/phpzone-docker
