<?php
/**
 * Created by PhpStorm.
 * User: sohra_000
 * Date: 06/01/2015
 * Time: 12:07
 */

namespace Upcast\ConsoleBundle\Model;

/**
 * Represents an UpcastMonth
 *
 * Class UpcastMonth
 * @package Upcast\ConsoleBundle\Model
 */
class UpcastMonth {
    /**
     * The month name
     */
    private $month;
    /**
     * The meeting date
     */
    private $meetingDate;
    /**
     * The end of month testing date
     */
    private $testingDate;
    const DEFAULT_MEEDING_DAY = 14;

    /**
     * @return mixed
     */
    public function getMonth()
    {
        return $this->month;
    }

    /**
     * @param mixed $month
     */
    public function setMonth($month)
    {
        $this->month = $month;
    }

    /**
     * @return mixed
     */
    public function getMeetingDate()
    {
        return $this->meetingDate;
    }

    /**
     * @param mixed $meetingDate
     */
    public function setMeetingDate($meetingDate)
    {
        $this->meetingDate = $meetingDate;
    }

    /**
     * @return mixed
     */
    public function getTestingDate()
    {
        return $this->testingDate;
    }

    /**
     * @param mixed $testingDate
     */
    public function setTestingDate($testingDate)
    {
        $this->testingDate = $testingDate;
    }

    public function __toString()
    {
        return $this->month . "," . $this->meetingDate . "," . $this->testingDate;
    }
}