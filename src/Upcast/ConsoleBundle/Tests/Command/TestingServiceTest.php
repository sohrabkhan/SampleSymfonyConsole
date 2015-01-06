<?php
/**
 * Created by PhpStorm.
 * User: sohra_000
 * Date: 06/01/2015
 * Time: 14:24
 */

namespace Upcast\ConsoleBundle\Tests\Command;

use Upcast\ConsoleBundle\HelperService\TestingService;

class TestingServiceTest extends \PHPUnit_Framework_TestCase
{
    public function testTesting()
    {
        $testingService = new TestingService();
        $date = new \DateTime();
        $date->setDate(2015, 1, 06);

        $testingDate = new \DateTime();
        $testingDate->setDate(2015, 1, 29);

        $testingService->testing($date);
        $this->assertTrue($testingDate == $date);
    }
}