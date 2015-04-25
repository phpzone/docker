Feature: Defining an availability of a Docker Compose command
  As a developer
  I want to be able to define an availability of a Docker Compose command
  So I can enable or disable any defined Docker Compose command

  Scenario: Disabling a command
    Given there is a config file with:
      """
      extensions:
          PhpZone\Docker\DockerCompose:
              'command:one':
                  enable: false
              'command:two': ~

      """
    When I run phpzone
    Then I should have "command:two" command
    And I should not have "command:one" command
