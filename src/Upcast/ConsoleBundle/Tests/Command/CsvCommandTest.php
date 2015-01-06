<?php
/**
 * Created by PhpStorm.
 * User: sohra_000
 * Date: 06/01/2015
 * Time: 13:25
 */

namespace Upcast\ConsoleBundle\Tests\Command;


use Symfony\Bundle\FrameworkBundle\Tests\Command\CacheClearCommand\Fixture\TestAppKernel;
use Upcast\ConsoleBundle\Command\CsvCommand;
use Symfony\Component\Console\Tester\CommandTester;
use Symfony\Bundle\FrameworkBundle\Console\Application;

class CsvCommandTest extends \PHPUnit_Framework_TestCase
{
    public function testExecute()
    {
        $kernel = new TestAppKernel('prod', false);
        $application = new Application($kernel);
        $application->add(new CsvCommand());

        $command = $application->find('upcast');
        $commandTester = new CommandTester($command);
        $filename = "Upcast.csv";
        $commandTester->execute(
            array(
                'filename'    => $filename,
            )
        );

        $this->assertRegExp('/successfully/', $commandTester->getDisplay());
    }
}