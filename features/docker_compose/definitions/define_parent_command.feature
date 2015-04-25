Feature: Defining a parent command
  As a developer
  I want to be able to define a parent command for a Docker Compose command
  So I can use an inheritance to avoid of a configuration duplicity

  Scenario: Defining a parent command
    Given there is a config file with:
      """
      extensions:
          PhpZone\Docker\DockerCompose:
              'command:one':
                  command: up
                  name: test_name
              'command:two':
                  parent: command:one
                  command: stop
                  file: docker-compose.yml
              'command:three':
                  parent: command:two
                  command: rm

      """
    When I run phpzone with "command:three"
    Then I should have running "docker-compose -f docker-compose.yml -p test_name rm"
