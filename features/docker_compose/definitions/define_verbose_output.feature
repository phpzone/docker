Feature: Defining a verbose output for a Docker Compose command
  As a developer
  I want to be able to define a verbose output for a command
  So I can see more details

  Scenario: Defining a verbose output for a Docker Compose command
    Given there is a config file with:
      """
      extensions:
          PhpZone\Docker\DockerCompose:
              'command:five':
                  verbose: true

      """
    When I run phpzone with "command:five"
    Then I should have running "docker-compose --verbose up"
