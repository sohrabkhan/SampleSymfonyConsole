<?php
/**
 * Created by PhpStorm.
 * User: Sohrab Khan
 * Date: 06/01/2015
 * Time: 05:46
 */

namespace Upcast\ConsoleBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Upcast\ConsoleBundle\HelperService\CsvWriter;
use Upcast\ConsoleBundle\HelperService\MeetingService;
use Upcast\ConsoleBundle\HelperService\TestingService;
use Upcast\ConsoleBundle\Model\Meeting;
use Upcast\ConsoleBundle\Model\Testing;
use Upcast\ConsoleBundle\Model\UpcastEvent;
use Upcast\ConsoleBundle\Model\UpcastMonth;

/**
 * The class that makes everything rock
 *
 * Class CsvCommand
 * @package Upcast\ConsoleBundle\Command
 */
class CsvCommand extends Command
{
    /**
     * @inheritdoc
     */
    protected function configure()
    {
        $this
            ->setName('upcast')
            ->setDescription('Generate Upcast meeting & testing CSV')
            ->addArgument(
                'filename',
                InputArgument::OPTIONAL,
                'Optionally enter the CSV filename which is to be generated'
            )
        ;
    }

    /**
     * @inheritdoc
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $filename = $input->getArgument('filename');
        $meetingService = new MeetingService();
        $testingService = new TestingService;

        // If no CSV filename has been given
        if($filename == NULL) {
            $filename = "Upcast.csv";
        }

        // Current date
        $date = new \DateTime();

        $months = array();
        for($i = 1; $i <= 6; $i ++) {
            $upcastMonth = new UpcastMonth();
            $meetingDate = $meetingService->meeting($date);
            $upcastMonth->setMonth($date->format('M'));
            $upcastMonth->setMeetingDate($meetingDate->format('d-m-Y'));

            $testingDate = $testingService->testing($date);
            $upcastMonth->setTestingDate($testingDate->format('d-m-Y'));

            //$output->writeln($upcastMonth->getTestingDate());
            $months[] = $upcastMonth;

            $date = new \DateTime();
            $date->add(new \DateInterval('P' . $i . 'M')); // Increment the date by 1 month
        }

        $csvWriter = new CsvWriter();
        $csvWriter->write($filename, $months);
        $output->writeln("Upcast monthly event calendar written successfully to file " . $filename);
    }
}