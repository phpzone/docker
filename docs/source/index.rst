PhpZone Docker
==============

.. toctree::
    :hidden:

    PhpZone <http://docs.phpzone.org>

A Docker command builder configured by `YAML`_, based on `PhpZone`_. Its primary purpose is to
provide a simple way to define commands for running Docker containers/instances which could be used in daily workflow
of every developer. Since now not all developers need to have a knowledge about Docker but still everyone can simply
understand what is running. It is not only about the knowledge but also experienced developers can find an advantage
in keeping ready-made commands.

.. attention::
    This tool is only a configurator and executor of Docker commands, so to make it working you must have installed
    `Docker`_ and `Docker Compose`_ your own.

Basic Usage
-----------

An example speaks a hundred words so let’s go through one.

The configuration file below is used for the development of this extension:

Create a ``phpzone.yml`` file in the root of a project:

.. code-block:: yaml

    extensions:
        PhpZone\Docker\DockerCompose: # register an extension with a configuration
            db:
                description: Run DB which can be used for running tests
                name: myproject
                file: docker-compose.yml
                command: up

and run:

.. code-block:: bash

    $ vendor/bin/phpzone db

This will compose a proper Docker Compose command and execute it.

.. _YAML: http://symfony.com/doc/current/components/yaml/yaml_format.html
.. _PhpZone: http://docs.phpzone.org
.. _Docker: https://docs.docker.com
.. _Docker Compose: https://docs.docker.com/compose
