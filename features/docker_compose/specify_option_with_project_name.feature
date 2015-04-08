Feature: Specifying a project name for Docker Compose command
  As a developer
  I want to be able to specify a project name for command
  So I can easily recognize running instances in Docker

  Scenario: Specifying a project name for Docker Compose command
    Given there is a config file with:
      """
      extensions:
          PhpZone\Docker\DockerCompose:
              'command:four':
                  name: test_name

      """
    When I run phpzone
    Then I should have "command:four" command with "docker-compose -p test_name up" command line
