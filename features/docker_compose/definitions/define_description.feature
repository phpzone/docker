Feature: Defining a description for a Docker Compose command
  As a developer
  I want to be able to define a description for a command
  So I can see what defined command does

  Scenario: Defining a description for a Docker Compose command
    Given there is a config file with:
      """
      extensions:
          PhpZone\Docker\DockerCompose:
              'command:two':
                  description: Test command description

      """
    When I run phpzone
    Then I should see "Test command description" in "command:two" command description
