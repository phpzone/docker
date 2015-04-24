Feature: Run Docker Composer without definitions
  As a developer
  I want to be able to define a Docker Compose environment without definitions
  So I can avoid of annoying configuration for default settings

  Scenario: Run Docker Composer without definitions
    Given there is a config file with:
      """
      extensions:
          PhpZone\Docker\DockerCompose:
              'command:one': ~

      """
    When I run phpzone with "command:one"
    Then I should have running "docker-compose up"
