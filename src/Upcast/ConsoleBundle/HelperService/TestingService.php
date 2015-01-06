<?php
/**
 * Created by PhpStorm.
 * User: Sohrab Khan
 * Date: 06/01/2015
 * Time: 07:18
 */

namespace Upcast\ConsoleBundle\HelperService;

class TestingService {
    /**
     * Checks if the date is OK otherwise returns a better suited date
     * @param \DateTime $date
     * @return \DateTime
     */
    private function getSafeDate(\DateTime $date)
    {
        // Get the day name for the last day of the month
        $day = $date->format('D');

        if($day == 'Fri') {
            $date->sub(new \DateInterval('P1D'));
        }

        if($day == 'Sat') {
            $date->sub(new \DateInterval('P2D'));
        }

        if($day == 'Sun') {
            $date->sub(new \DateInterval('P3D'));
        }

        return $date;
    }

    /**
     * This method accepts a DateTime object and processes if the date provided is OK for testing and then
     * returns a Testing Object.
     *
     * @param \Datetime $date
     * @return Testing
     */
    public function testing(\DateTime $date)
    {
        //Last day of the month
        $days_in_month = cal_days_in_month(CAL_GREGORIAN, $date->format('m'), $date->format('Y'));

        // Set the date object to the last day of the month
        $date->setDate($date->format('Y'), $date->format('m'), $days_in_month);


        // See if the date is safe for a testing i.e. it's not friday, sat or sunday
        $testingDate = $this->getSafeDate($date);

        // Return the testing date
        return $testingDate;
    }
}