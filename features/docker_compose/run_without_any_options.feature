Feature: Run Docker Composer without any options
  As a developer
  I want to specify docker compose environment without any options
  So I can avoid of annoying configuration for default settings

  Scenario: Run Docker Composer without any options
    Given there is a config file with:
      """
      extensions:
          PhpZone\Docker\DockerCompose:
              'docker-compose': ~

      """
    When I run phpzone
    Then I should have "docker-compose" command with "docker-compose up" command line
