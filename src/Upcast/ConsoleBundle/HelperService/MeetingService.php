<?php
/**
 * Created by PhpStorm.
 * User: Sohrab Khan
 * Date: 06/01/2015
 * Time: 06:24
 */
namespace Upcast\ConsoleBundle\HelperService;

use Upcast\ConsoleBundle\Model\UpcastMonth;

class MeetingService
{
    /**
     * Checks if the date is OK otherwise returns a better suited date
     * @param \DateTime $date
     * @return \DateTime
     */
    private function getSafeDate(\DateTime $date)
    {
        $day = $date->format('D');

        if($day == 'Sat') {

            $date->add(new \DateInterval('P2D'));
        }

        if($day == 'Sun') {
            $date->add(new \DateInterval('P1D'));
        }

        return $date;
    }

    /**
     * This method accepts a DateTime object and processes if the date provided is OK for a meeting and then
     * returns a Meeting Object.
     *
     * @param \DateTime $date
     * @return \DateTime
     */
    public function meeting(\DateTime $date)
    {
        // Set the DateTime object to the meeting's default day which is 14th
        $date = $date->setDate($date->format('Y'), $date->format('m'), UpcastMonth::DEFAULT_MEEDING_DAY);

        // See if the default day is safe i.e. falls on saturdays or sundays
        $date = $this->getSafeDate($date);

        // Return the safe date
        return $date;
    }
}