# Change Log
All notable changes to this project will be documented in this file.

## [Unreleased][unreleased]

## [0.2.0-beta]
### Added
- Definition `parent` for an inheritance of Docker Compose commands.
- Options to rewrite a definition command of a Docker Compose command by another allowed one.
- Definition `help` for a Docker Compose command help.
- Definition `enable` to enable/disable a Docker Compose command.
- Definitions for options of Docker Compose commands `build`, `rm`, `scale` and `up`.
- Definition `verbose` for showing more output in Docker Compose.
- Definitions for Docker Compose commands `build`, `kill`, `logs`, `ps`, `pull`, `rm`, `scale`, `start`,
`stop` and `up`.

### Fixed
- BC changes for extensions in PhpZone 0.2.

## [0.1.1] - 2015-04-10
### Changed
- Set PhpZone dependency on 0.1.*

## 0.1.0 - 2015-04-08
### Added
- Definition `name` for a name of instances.
- Definition `file` for a path of Docker Compose configuration file.
- Definition `description` for a command description.
- Simple running Docker Compose without any options.

[unreleased]: https://github.com/phpzone/docker/compare/0.2.0-beta...HEAD
[0.2.0-beta]: https://github.com/phpzone/docker/compare/0.1.1...0.2.0-beta
[0.1.1]: https://github.com/phpzone/docker/compare/0.1.0...0.1.1
