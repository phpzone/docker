Definitions For Command
=======================

Commands can contain following definitions:

============== ======= ======================== ========
Name           Type    Default                  Required
============== ======= ======================== ========
build          array                            No
command        string  up                       No
description    string  null                     No
enable         boolean true                     No
file           string  docker-compose.yml       No
help           string  null                     No
name           string  *current directory name* No
parent         string  null                     No
rm             array                            No
scale          array                            No
up             array                            No
verbose        boolean false                    No
============== ======= ======================== ========

Example with default values:

.. code-block:: yaml

    extensions:
        PhpZone\Docker\DockerCompose:
            command_name:
                build:
                    no_cache: false
                command: up
                description: ~
                enable: true
                file: ~
                help: ~
                name: ~  # current directory name
                parent: ~
                rm:
                    force: false
                scale: ~
                up:
                    daemon:      false
                    no_recreate: false
                    no_build:    false
                verbose: false

.. note::
    The order of definitions can be random.

.. note::
    Not required definitions don't need to be set.

build
-----
======= ======= ========
Type    Default Required
======= ======= ========
array           No
======= ======= ========

Extended options in case of the definition ``command: build``.

Example with default values:

.. code-block:: yaml

    extensions:
        PhpZone\Docker\DockerCompose:
            command_name:
                build:
                    no_cache: false

no_cache
^^^^^^^^
======= ======= ========
Type    Default Required
======= ======= ========
boolean false   No
======= ======= ========

Do not use cache when building the image.

command
-------
======= ======= ========
Type    Default Required
======= ======= ========
string  up      No
======= ======= ========

Specifies which command will be run against services. Available commands are: ``build``, ``kill``, ``logs``, ``ps``,
``pull``, ``rm``, ``scale``, ``start``, ``stop`` and ``up``. For more information read `official documentation of
Docker Compose <https://docs.docker.com/compose/cli/#commands>`_.

description
-----------
======= ======= ========
Type    Default Required
======= ======= ========
string  null    No
======= ======= ========

The description of a command will be displayed when a developer would run the command ``list`` or without any command.

enable
------
======= ======= ========
Type    Default Required
======= ======= ========
boolean true    No
======= ======= ========

All defined commands are enabled by default. Sometimes can be useful to disable a command without its removal.

file
----
======= ================== ========
Type    Default            Required
======= ================== ========
string  docker-compose.yml No
======= ================== ========

Specifies an alternate Compose yaml file.
`Official documentation of Docker Compose <https://docs.docker.com/compose/cli/#-f-file-file>`_

help
----
======= ======= ========
Type    Default Required
======= ======= ========
string  null    No
======= ======= ========

The help of a command will be displayed when a developer would run the command ``help``.

name
----
======= ======================== ========
Type    Default Required
======= ======================== ========
string  *current directory name*    No
======= ======================== ========

Specifies an alternate project name.
`Official documentation of Docker Compose <https://docs.docker.com/compose/cli/#-p-project-name-name>`_

parent
------
======= ======= ========
Type    Default Required
======= ======= ========
string  null    No
======= ======= ========

It can help you to define more commands related to the same definitions, so it can help to avoid duplications.
The value is defined as ``parent: command_name``.

Example:

.. code-block:: yaml

    extensions:
        PhpZone\Docker\DockerCompose:
            command_name_1:
                command: up
                name:    myproject
            command_name_2:
                command: stop
                parent:  command_name_1

If you run:

.. code-block:: bash

    $ vendor/bin/phpzone comand_name_2

This will compose ``docker-compose -p myproject stop`` and execute it.

rm
--
======= ======= ========
Type    Default Required
======= ======= ========
array           No
======= ======= ========

Extended options in case of the definition ``command: rm``.

Example with default values:

.. code-block:: yaml

    extensions:
        PhpZone\Docker\DockerCompose:
            command_name:
                rm:
                    force: false

force
^^^^^
======= ======= ========
Type    Default Required
======= ======= ========
boolean false   No
======= ======= ========

Don't ask to confirm removal.

scale
-----
======= ======= ========
Type    Default Required
======= ======= ========
array           No
======= ======= ========

Extended options in case of the definition ``command: scale``. Numbers are specified in the form
``service_name: integer``.

Example:

.. code-block:: yaml

    extensions:
        PhpZone\Docker\DockerCompose:
            command_name:
                scale:
                    service_name_1: 3
                    service_name_2: 2

up
--
======= ======= ========
Type    Default Required
======= ======= ========
array           No
======= ======= ========

Extended options in case of the definition ``command: up``.

Example with default values:

.. code-block:: yaml

    extensions:
        PhpZone\Docker\DockerCompose:
            command_name:
                up:
                    daemon:      false
                    no_recreate: false
                    no_build:    false

daemon
^^^^^^
======= ======= ========
Type    Default Required
======= ======= ========
boolean false   No
======= ======= ========

Detached mode: Run containers in the background, print new container names.

no_recreate
^^^^^^^^^^^
======= ======= ========
Type    Default Required
======= ======= ========
boolean false   No
======= ======= ========

If containers already exist, don't recreate them.

no_build
^^^^^^^^
======= ======= ========
Type    Default Required
======= ======= ========
boolean false   No
======= ======= ========

Don't build an image, even if it's missing.

verbose
-------
======= ======= ========
Type    Default Required
======= ======= ========
boolean false   No
======= ======= ========

Show more output.
`Official documentation of Docker Compose <https://docs.docker.com/compose/cli/#-verbose>`_
