<?php

namespace PhpZone\Behat;

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use PhpZone\PhpZone\Application;
use Symfony\Component\Console\Tester\ApplicationTester;
use Symfony\Component\DependencyInjection\ContainerBuilder;

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
        $container = new ContainerBuilder();
        $application = new Application('x.y.z', $container);
        $application->setAutoExit(false);
        $this->application = $application;

        $this->tester = new ApplicationTester($this->application);

        $container->setAlias(
            'phpzone.docker.script_builder.docker_compose',
            'phpzone.docker.tester.script_builder.docker_compose'
        );
    }

    /**
     * @When I run phpzone
     * @When I run phpzone with :command
     * @When I run phpzone with :command and :option
     */
    public function iRunPhpzoneWith($command = null, $option = null)
    {
        $input = array('--no-tty' => true);
        $input = array_merge($input, array($command));

        if ($option !== null) {
            $input = array_merge($input, array($option => true));
        }

        $this->tester->run($input);
    }

    /**
     * @Then I should have running :script
     */
    public function iShouldHaveRunning($script)
    {
        expect($this->tester->getDisplay())->toBe($script . PHP_EOL);
    }

    /**
     * @Then I should see :text in :command command description
     */
    public function iShouldSeeInCommandDescription($text, $command)
    {
        expect($this->application->get($command)->getDescription())->shouldBeLike($text);
    }

    /**
     * @Then I should have :commandName command
     */
    public function iShouldHaveCommand($commandName)
    {
        expect($this->application->has($commandName))->toBe(true);
    }

    /**
     * @Then I should not have :commandName command
     */
    public function iShouldNotHaveCommand($commandName)
    {
        expect($this->application->has($commandName))->toBe(false);
    }

    /**
     * @Then I should see :text in :command command help
     */
    public function iShouldSeeInCommandHelp($text, $command)
    {
        expect($this->application->get($command)->getHelp())->shouldBeLike($text);
    }
}
