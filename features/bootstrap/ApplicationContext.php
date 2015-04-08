<?php

namespace PhpZone\Behat;

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use PhpZone\PhpZone\Application;
use Symfony\Component\Console\Tester\ApplicationTester;

/**
 * Defines application features from the specific context.
 */
class ApplicationContext implements Context, SnippetAcceptingContext
{
    /** @var Application */
    private $application;

    /** @var ApplicationTester */
    private $tester;

    /**
     * @beforeScenario
     */
    public function setUpEnvironment()
    {
        $this->setApplicationTest();
    }

    private function setApplicationTest()
    {
        $application = new Application('0.1.0');
        $application->setAutoExit(false);
        $this->application = $application;

        $this->tester = new ApplicationTester($this->application);
    }

    /**
     * @When I run phpzone
     * @When I run phpzone with :command
     */
    public function iRunPhpzoneWith($command = null)
    {
        $input = array('--no-tty' => true);
        $input = array_merge($input, array($command));

        $this->tester->run($input);
    }

    /**
     * @Then I should have :command command with :commandLine command line
     */
    public function iShouldHaveCommandWithCommandLine($command, $commandLine)
    {
        $quotedCommandLine = $this->convertSimpleCommandLineIntoQuotedCommandLine($commandLine);

        $command = $this->application->get($command);
        expect($command->getProcess()->getCommandLine())->shouldBeLike($quotedCommandLine);
    }

    /**
     * @param string $commandLine
     *
     * @return string
     */
    private function convertSimpleCommandLineIntoQuotedCommandLine($commandLine)
    {
        $arguments = explode(' ', $commandLine);

        $quotedArguments = array_map(function ($argument) {
            return "'" . $argument . "'";
        }, $arguments);

        $quotedCommandLine = implode(' ', $quotedArguments);

        return $quotedCommandLine;
    }
}
