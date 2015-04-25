Feature: Defining a project name for a Docker Compose command
  As a developer
  I want to be able to define a project name for a command
  So I can easily recognize running instances in Docker

  Scenario: Defining a project name for a Docker Compose command
    Given there is a config file with:
      """
      extensions:
          PhpZone\Docker\DockerCompose:
              'command:four':
                  name: test_name

      """
    When I run phpzone with "command:four"
    Then I should have running "docker-compose -p test_name up"
