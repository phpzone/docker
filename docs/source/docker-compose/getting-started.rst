Getting Started
===============

Requirements
------------

PhpZone requires PHP 5.3 or higher.

Installation
------------

Installation is provided via `Composer`_, if you don't have it, do install:

.. code-block:: bash

    $ curl -s https://getcomposer.org/installer | php

then PhpZone Docker Compose can be added into your dependencies by:

.. code-block:: bash

    $ composer require --dev phpzone/docker 0.2.*

or add it manually into your ``composer.json``:

.. code-block:: json

    {
        "required-dev": {
            "phpzone/docker": "0.2.*"
        }
    }

Configuration file
------------------

If the configuration file doesn't exist yet, you can find more information in `PhpZone - Getting Started`_

Registration of the extension
^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

Registration is provided by a simple definition of full name of the class (namespace included):

.. code-block:: yaml

    extensions:
        PhpZone\Docker\DockerCompose: ~

.. note::
    This extension is a command builder with definitions within its values. It means that only the registration
    without any values would have no effect.

Creating of commands
^^^^^^^^^^^^^^^^^^^^

As mentioned in the PhpZone documentation, each extension gets its configuration via values which are defined during
its registration. PhpZone Docker Compose expects to get an array of required commands. Each command has defined its name
as a key and its values are definitions for exact command:

.. code-block:: yaml

    extensions:
        PhpZone\Docker\DockerCompose:
            command_name:
                command: up

Now, when we would run:

.. code-block:: bash

    $ vendor/bin/phpzone command_name

we would have a proper Docker Compose command ``docker-compose up`` and it would be executed.

.. _Composer: https://getcomposer.org
.. _PhpZone - Getting Started: http://docs.phpzone.org/en/latest/getting-started.html#configuration-file
