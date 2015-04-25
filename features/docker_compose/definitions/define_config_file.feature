Feature: Defining a path of config file for a Docker Compose command
  As a developer
  I want to be able to define a path of config file for a command
  So I can use existing Docker Compose config file

  Scenario: Defining a path of config file for a Docker Compose command
    Given there is a config file with:
      """
      extensions:
          PhpZone\Docker\DockerCompose:
              'command:three':
                  file: docker-compose.yml

      """
    When I run phpzone with "command:three"
    Then I should have running "docker-compose -f docker-compose.yml up"
