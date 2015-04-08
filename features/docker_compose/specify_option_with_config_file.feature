Feature: Specifying a path of config file for Docker Compose command
  As a developer
  I want to be able to specify a path of config file for command
  So I can use existing Docker Compose config file

  Scenario: Specifying a path of config file for Docker Compose command
    Given there is a config file with:
      """
      extensions:
          PhpZone\Docker\DockerCompose:
              'command:three':
                  file: docker-compose.yml

      """
    When I run phpzone
    Then I should have "command:three" command with "docker-compose -f docker-compose.yml up" command line
