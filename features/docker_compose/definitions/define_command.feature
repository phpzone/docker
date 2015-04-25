Feature: Defining the command for a Docker Compose command
  As a developer
  I want to be able to define the command for a command
  So I can specific command of Docker Compose

  Scenario Outline: Defining the command for a Docker Compose command
    Given there is a config file with:
      """
      extensions:
          PhpZone\Docker\DockerCompose:
              command:
                  command: <command>

      """
    When I run phpzone with "command"
    Then I should have running "docker-compose <command>"

    Examples:
      | command |
      | build   |
      | kill    |
      | logs    |
      | ps      |
      | pull    |
      | rm      |
      | scale   |
      | start   |
      | stop    |
      | up      |

  Scenario: Defining the build command with no cache for a Docker Compose command
    Given there is a config file with:
      """
      extensions:
          PhpZone\Docker\DockerCompose:
              command:
                  command: build
                  build:
                      no_cache: true

      """
    When I run phpzone with "command"
    Then I should have running "docker-compose build --no-cache"

  Scenario: Defining the rm command with force for a Docker Compose command
    Given there is a config file with:
      """
      extensions:
          PhpZone\Docker\DockerCompose:
              command:
                  command: rm
                  rm:
                      force: true

      """
    When I run phpzone with "command"
    Then I should have running "docker-compose rm --force"

  Scenario: Defining the scale command with number of instances for a Docker Compose command
    Given there is a config file with:
      """
      extensions:
          PhpZone\Docker\DockerCompose:
              command:
                  command: scale
                  scale:
                      web: 2
                      worker: 3

      """
    When I run phpzone with "command"
    Then I should have running "docker-compose scale web=2 worker=3"

  Scenario: Defining the up command as a daemon for a Docker Compose command
    Given there is a config file with:
      """
      extensions:
          PhpZone\Docker\DockerCompose:
              command:
                  command: up
                  up:
                      daemon: true

      """
    When I run phpzone with "command"
    Then I should have running "docker-compose up -d"

  Scenario: Defining the up command with no recreate for a Docker Compose command
    Given there is a config file with:
      """
      extensions:
          PhpZone\Docker\DockerCompose:
              command:
                  command: up
                  up:
                      no_recreate: true

      """
    When I run phpzone with "command"
    Then I should have running "docker-compose up --no-recreate"

  Scenario: Defining the up command with no build for a Docker Compose command
    Given there is a config file with:
      """
      extensions:
          PhpZone\Docker\DockerCompose:
              command:
                  command: up
                  up:
                      no_build: true

      """
    When I run phpzone with "command"
    Then I should have running "docker-compose up --no-build"
