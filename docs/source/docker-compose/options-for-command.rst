Options For Command
===================

All built commands have their definitions of how they are executed, but sometimes it's useful to have an option
to rewrite a defined parameter or extend a functionality. This is provided by options below.

Options are extended attributes which can be set either before command name or after command name, so both following
examples are valid:

.. code-block:: bash

    $ vendor/bin/phpzone <OPTION> <COMMAND>

.. code-block:: bash

    $ vendor/bin/phpzone <COMMAND> <OPTION>

.. tip::
    All available options can be displayed by:

    .. code-block:: bash

        $ vendor/bin/phpzone <COMMAND> --help

--build
^^^^^^^

Overwrites defined command by ``build``. `Command definition`_

--kill
^^^^^^

Overwrites defined command by ``kill``. `Command definition`_

--logs
^^^^^^

Overwrites defined command by ``logs``. `Command definition`_

--ps
^^^^

Overwrites defined command by ``ps``. `Command definition`_

--pull
^^^^^^

Overwrites defined command by ``pull``. `Command definition`_

--rm
^^^^

Overwrites defined command by ``rm``. `Command definition`_

--scale
^^^^^^^

Overwrites defined command by ``scale``. `Command definition`_

--start
^^^^^^^

Overwrites defined command by ``start``. `Command definition`_

--stop
^^^^^^

Overwrites defined command by ``stop``. `Command definition`_

--up
^^^^

Overwrites defined command by ``up``. `Command definition`_


.. _Command definition: definitions-for-command.html#command
