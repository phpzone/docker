Feature: Overwriting a command value of a Docker Compose command by an option
  As a developer
  I want to be able to overwrite the command value for a Docker Compose command by an option
  So I can have one Docker Command definition and dynamically change actions with Docker instances

  Scenario Outline: Overwriting a command value of a Docker Compose command by an option
    Given there is a config file with:
      """
      extensions:
          PhpZone\Docker\DockerCompose:
              command: ~

      """
    When I run phpzone with "command" and "--<option>"
    Then I should have running "docker-compose <option>"

    Examples:
      | option |
      | build  |
      | kill   |
      | logs   |
      | ps     |
      | pull   |
      | rm     |
      | scale  |
      | start  |
      | stop   |
      | up     |
