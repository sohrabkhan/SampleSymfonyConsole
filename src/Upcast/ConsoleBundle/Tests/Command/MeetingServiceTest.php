<?php
/**
 * Created by PhpStorm.
 * User: sohra_000
 * Date: 06/01/2015
 * Time: 14:17
 */

namespace Upcast\ConsoleBundle\Tests\Command;


use Upcast\ConsoleBundle\HelperService\MeetingService;

class MeetingServiceTest extends \PHPUnit_Framework_TestCase
{
    public function testMeeting()
    {
        $meetingService = new MeetingService();
        $date = new \DateTime();
        $date->setDate(2015, 2, 06);

        $meetingDate = new \DateTime();
        $meetingDate->setDate(2015, 2, 16);

        $meetingService->meeting($date);
        $this->assertTrue($meetingDate == $date);
    }
}