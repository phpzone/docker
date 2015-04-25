Feature: Defining a help for a Docker Compose command
  As a developer
  I want to be able to define a help for a Docker Compose command
  So I can provide better explanation how the command works or to use

  Scenario: Defining a help for a Docker Compose command
    Given there is a config file with:
      """
      extensions:
          PhpZone\Docker\DockerCompose:
              'command':
                  help: Some help text

      """
    When I run phpzone with "command"
    Then I should see "Some help text" in "command" command help
